<?php

namespace Shop\AdminBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Shop\AdminBundle\Entity\MainMenu;

class MenuController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('ShopAdminBundle:Menu:index.html.twig');
    }

    public function newGroupAction(Request $request)
    {
        $menu = new MainMenu;

        $form = $this->createForm('Shop\AdminBundle\Form\MainMenuType', $menu);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $menu->setName($name);

            $query = $this->getDoctrine()->getManager();
            $query->persist($menu);
            $query->flush();

            return $this->redirectToRoute('group_new');
        }

        return $this->render('ShopAdminBundle:Menu:new_group.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function newSubgroupAction(Request $request)
    {
        return $this->render('ShopAdminBundle:Menu:new_subgroup.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function showAction()
    {
        return $this->render('ShopAdminBundle:Menu:show.html.twig');
    }
}