<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comanda;
use AppBundle\Entity\ItemComanda;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    private $request;

    public function addAction(Request $request)
    {
        $this->request = $request;
        $productId = $request->get('id');
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $productId
            );
        }

        $this->add($product, 1);
        return $this->redirect($request->headers->get('referer'));
    }

    public function showAction(Request $request)
    {
        $this->request = $request;
        $fails = array();
        if ($request->getMethod() === 'POST' && $request->get('update') != null) {
            $fails = $this->updateShoppingCart($request->get('shoppingcart'));
        }
        if ($request->getMethod() === 'POST' && $request->get('send') != null) {
            $this->sendShoppingCart();
            return $this->redirectToRoute('shopping_cart_send_success');
        }

        $cart = $this->getCartWithDetails();
        $totalPrice = $this->calculateTotalPrice($cart);

        return $this->render('AppBundle:Cart:show.html.twig', array('cart' => $cart, 'totalPrice' => $totalPrice, 'fails' => $fails));
    }

    public function sendSuccessAction()
    {
        return $this->render('AppBundle:Cart:send_success.html.twig');
    }

    private function add(Product $product, $quantity)
    {
        $cart = $this->getCart();
        $productId = $product->getId();
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        $this->saveCart($cart);
    }

    private function getCart()
    {
        $session = $this->request->getSession();
        return $session->get('cart', array());
    }

    private function getCartWithDetails()
    {
        $result = array();
        $cart = $this->getCart();
        $repo = $this->getDoctrine()->getRepository('AppBundle:Product');
        foreach ($cart as $itemId => $itemQuantity) {
            $product = $repo->find($itemId);
            $totalPrice = floatval($product->getPrice()) * $itemQuantity;
            $result[] = array('item' => $product, 'quantity' => $itemQuantity, 'totalPrice' => $totalPrice);
        }
        return $result;
    }

    private function saveCart($cart)
    {
        $this->request->getSession()->set('cart', $cart);
    }

    private function calculateTotalPrice($cart)
    {
        $total = 0;
        foreach ($cart as $cartItem) {
            $total += $cartItem['totalPrice'];
        }
        return $total;
    }

    private function updateShoppingCart($parameters)
    {
        $cart = $this->getCart();
        $repo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $fails = array();
        foreach ($parameters as $itemId => $quantity) {
            $product = $repo->find($itemId);
            if ($product->getStock() >= $quantity) {
                if (isset($cart[$itemId])) {
                    $cart[$itemId] = intval($quantity);
                }
            } else {
                $fails[] = $product;
            }
        }
        $this->saveCart($cart);
        return $fails;
    }

    private function sendShoppingCart()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $cart = $this->getCart();
        $comanda = new Comanda();
        $comanda->setUser($this->get('security.token_storage')->getToken()->getUser());
        $em->persist($comanda);
        foreach ($cart as $itemId => $quantity) {
            $itemComanda = new ItemComanda();
            $itemComanda->setProduct($repo->find($itemId));
            $itemComanda->setQuantity($quantity);
            $itemComanda->setComanda($comanda);
            $em->persist($itemComanda);
        }

        $em->flush();
        $this->clearCart();
    }

    private function clearCart()
    {
        $this->saveCart(array());
    }
}