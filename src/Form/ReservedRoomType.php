<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\ReservedRoom;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservedRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number_of_rooms')
            ->add('status')
            ->add('room_type', EntityType::class, [
                'class' => \App\Entity\RoomType::class,
                'choice_label' => 'description',
            ])
            ->add('reservation', EntityType::class, [
                'class' => Reservation::class,
                'choice_label' => 'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReservedRoom::class,
        ]);
    }
}
