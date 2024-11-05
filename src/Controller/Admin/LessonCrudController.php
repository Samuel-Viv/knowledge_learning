<?php

namespace App\Controller\Admin;

use App\Entity\Cursus;
use App\Entity\Lesson;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Validator\Constraints\File;

class LessonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lesson::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id_lesson')
                ->onlyOnIndex(),
            TextField::new('name_lesson'),
            MoneyField::new('price')->setCurrency('EUR'),
            TextareaField::new('content'),
            
            ImageField::new('video_url')
                ->setUploadDir('public/assets/uploads/videos')
                ->setBasePath('/uploads/videos')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFileConstraints([
                    new File([
                        'maxSize' => '100M',               
                        'mimeTypes' => [
                            'video/mp4',                 
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une vidéo valide (MP4)',
                        'maxSizeMessage' => 'Veuillez télécharger une vidéo valide 100M maximum'
                    ]),
                ])
                ->setRequired(false),

            DateTimeField::new('createdAt', 'Créer le ')
                ->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Mis à jour le')
                ->onlyOnIndex(),

            CollectionField::new('cursus')
        
            
        ];
    }

}
