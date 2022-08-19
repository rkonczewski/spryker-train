<?php

namespace Pyz\Zed\Planet\Communication\Form;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PlanetForm extends AbstractType
{
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'planet';
    }

    /**
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => PlanetTransfer::class
        ]);
    }

    private const FIELD_NAME = 'name';
    private const FIELD_INTERESTING_FACT = 'interesting_fact';
    private const FIELD_SIZE = 'size';
    public const BUTTON_SUBMIT = 'Submit';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)
            ->addInterestingFactField($builder)
            ->addSizeField($builder)
            ->addSubmitButton($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlanetForm
     */
    private function addNameField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 2,
                    'minMessage' => 'Name minimum length is at least {{ limit }}',
                    'max' => 50,
                    'maxMessage' => 'Name maximum length is {{ limit }}',
                ]),
            ]
        ]);
        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlanetForm
     */
    private function addInterestingFactField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_INTERESTING_FACT, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 15,
                    'minMessage' => 'Interesting fact minimum length is at least {{ limit }}',
                    'max' => 255,
                    'maxMessage' => 'Interesting fact maximum length is {{ limit }}',
                ]),
            ]
        ]);
        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlanetForm
     */
    private function addSizeField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_SIZE, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 2,
                    'minMessage' => 'Size minimum length is at least {{ limit }}',
                    'max' => 50,
                    'maxMessage' => 'Size maximum length is {{ limit }}',
                ])
            ]
        ]);
        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return $this
     */
    public function addSubmitButton(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }

}
