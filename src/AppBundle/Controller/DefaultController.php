<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     "/{_locale}/", name="homepage",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("/", name="home")
     */
    public function index2Action(Request $request)
    {
        return $this->redirectToRoute('homepage');
    }
    /**
     * @Route(
     *     "/{_locale}/call", name="call",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function callAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/call.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route(
     *     "/{_locale}/authors", name="authors",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function authorsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/authors.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route(
     *     "/{_locale}/registration", name="registration",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function registrationAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/registration.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route(
     *     "/{_locale}/venue", name="venue",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function venueAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/venue.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route(
     *     "/{_locale}/program", name="program",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function programAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/program.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route(
     *     "/{_locale}/committee", name="committee",
     *     requirements={
     *         "_locale": "es|en",
     *     }
     * )
     */
    public function comiteAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/comite.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
