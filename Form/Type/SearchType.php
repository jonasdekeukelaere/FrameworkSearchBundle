<?php

namespace SumoCoders\FrameworkSearchBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Constraints\NotBlank;

class SearchType extends AbstractType
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'q',
            'text',
            array(
                'label' => ucfirst($this->translator->trans('forms.search.labels.search')),
                'constraints' => array(
                    new NotBlank(),
                ),
            )
        )
            ->add(
                'search',
                'submit',
                array(
                    'label' => ucfirst($this->translator->trans('forms.search.buttons.search')),
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return '';
    }
}