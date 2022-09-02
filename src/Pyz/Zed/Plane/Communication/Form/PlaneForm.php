<?php

namespace Pyz\Zed\Plane\Communication\Form;

use Generated\Shared\Transfer\PlaneTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PlaneForm extends AbstractType
{
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'plane';
    }

    /**
     * @param $resolver
     * @return void
     */
    public function configureOptions($resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => PlaneTransfer::class
        ]);
    }

    private const FIELD_NAME = 'name';
    private const FIELD_COUNTRY_OF_ORIGIN = 'country_of_origin';
    private const FIELD_DESIGNED_YEAR = 'designed_tear';
    private const FIELD_CREW = 'crew';
    private const FIELD_RANGE = 'range';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)
            ->addCountryOfOriginField($builder)
            ->addDesignedYearField($builder)
            ->addCrewField($builder)
            ->addRangeField($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlaneForm
     */
    private function addNameField(FormBuilderInterface $builder): PlaneForm
    {
        $builder->add(static::FIELD_NAME, TextType::class);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlaneForm
     */
    private function addCountryOfOriginField(FormBuilderInterface $builder): PlaneForm
    {
        $builder->add(static::FIELD_COUNTRY_OF_ORIGIN, TextType::class);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlaneForm
     */
    private function addDesignedYearField(FormBuilderInterface $builder): PlaneForm
    {
        $builder->add(static::FIELD_DESIGNED_YEAR, TextType::class);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlaneForm
     */
    private function addCrewField(FormBuilderInterface $builder): PlaneForm
    {
        $builder->add(static::FIELD_CREW, TextType::class);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return PlaneForm
     */
    private function addRangeField(FormBuilderInterface $builder): PlaneForm
    {
        $builder->add(static::FIELD_RANGE, TextType::class);

        return $this;
    }
}
