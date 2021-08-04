<?php

namespace App\Form;

use App\Entity\OccupiedRoom;
use App\Entity\Reservation;
use App\Entity\Room;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OccupiedRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('check_in', DateTimeType::class,[

            ])
            ->add('check_out', DateTimeType::class,[

            ])
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'name',
            ])
            ->add('reservation', EntityType::class, [
                'class' => Reservation::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OccupiedRoom::class,
        ]);
    }
}
