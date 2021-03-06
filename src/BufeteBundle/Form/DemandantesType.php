<?php

namespace BufeteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class DemandantesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreDemandante')
            ->add('edadDemandante')
            ->add('dpiDemandante' ,TextType::class, array("label"=>"DPI:",  "attr" =>array(
      				"class" => "form-control",
      			)))
            ->add('cedulaDemandante')
            ->add('direccionDemandante')
            ->add('residenciaDemandante')
            ->add('dirtrabajoDemandante')
            ->add('telefonoDemandante')
            ->add('idEstadocivil')
            ->add('idTrabajo')
            ->add('idCiudad')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BufeteBundle\Entity\Demandantes'
        ));
    }
}
