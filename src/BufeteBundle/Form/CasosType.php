<?php

namespace BufeteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class CasosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noCaso')
            ->add('fechaCaso',  DateTimeType::class)
            ->add('pruebasCaso')
            ->add('asignatarioCaso')
            ->add('estadoCaso')
            ->add('idTipoasunto')
            ->add('idDemandante')
            ->add('idDemandado')
            ->add('idEstudiante')
            ->add('idTribunal')
            ->add('idPersona')
            ->add('idTipo')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BufeteBundle\Entity\Casos'
        ));
    }
}
