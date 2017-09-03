<?php

namespace BufeteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
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
            ->add('estadoCaso', ChoiceType::class,array(
              "label" => "Estado:",
              "choices"=> array(
                "Activo" => 2,
                "Deshabilitado" => 1
              )
            ))
            ->add('idTipoasunto')
            ->add('idDemandante')
            ->add('idDemandado')
            ->add('idEstudiante')
            ->add('idTribunal')
            ->add('idPersona', EntityType::class,array(
              "class" => "BufeteBundle:Personas",
              "label" => "Asesor: ",
              "query_builder" => function (EntityRepository $er){
                return $er->createQueryBuilder('persona')
                ->where('persona.role = :rol')
                ->setParameter('rol', 'ROLE_ASESOR');
                }
            ))
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
