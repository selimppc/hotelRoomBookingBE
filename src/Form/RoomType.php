<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\Room;
use App\Entity\RoomType as RoomTp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('name')
            ->add('status')
            ->add('is_smoke')
            ->add('hotel', EntityType::class, [
                'class' => Hotel::class,
                'choice_label' => 'name',
            ])
            ->add('room_type', EntityType::class, [
                'class' => RoomTp::class,
                'choice_label' => 'description',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
