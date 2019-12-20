<?php

namespace App\Form;

use App\Entity\Travel;
use App\Service\StationService;
use App\Service\StationCarService;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TravelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $stationService = new Stationservice();
        $stationCarservice = new StationCarService();
        $stations = array_combine(array_keys($stationService->getStations()), array_keys($stationService->getStations()));
        $stationCarservice = array_combine(array_keys($stationCarservice->getStationsCar()), array_keys($stationCarservice->getStationsCar()));
        $builder
            ->add('start', ChoiceType::class, [
                //'choices' => $stations,
                'choices' => ['Stations vélo +' => $stations, 'Parkings relais' =>$stationCarservice],
                'label' => 'Départ ',
//                'mapped' => false,
            ])
            ->add('finish', ChoiceType::class, [
                //'choices' => $stations,
                'choices' => ['Stations vélo +' => $stations, 'Parkings relais' =>$stationCarservice],
                'label' => 'Arrivée ',
//                'mapped' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
//            'data_class' => Travel::class,
        ]);
    }
}
