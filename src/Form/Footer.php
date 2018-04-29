<?php

namespace Panel\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Footer implements \Panel\ApiInterface
{

	public function handle(array $request)
	{
		$twig = new \Twig_Environment(new \Twig_Loader_Filesystem(array('src/views', 'vendor/symfony/twig-bridge/Resources/views/Form')));
		$formEngine = new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array('bootstrap_4_layout.html.twig'), $twig);
		$twig->addRuntimeLoader(new \Twig_FactoryRuntimeLoader(array(
			\Symfony\Component\Form\FormRenderer::class => function () use ($formEngine) {
				return new \Symfony\Component\Form\FormRenderer($formEngine);
			},
		)));
		$twig->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension());

		$translator = new \Symfony\Component\Translation\Translator('en');
		$twig->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($translator));
		
		$formFactory = \Symfony\Component\Form\Forms::createFormFactory();
		$form = $formFactory->createNamedBuilder('footer');
		
		$form->add('text', TextType::class);
		$form->add('submit', SubmitType::class);
		
		echo $twig->render('form.twig', ['form' => $form->getForm()->createView()]);
	}

}
