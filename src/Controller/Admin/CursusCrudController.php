<?php

namespace App\Controller\Admin;

use App\Entity\Cursus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CursusCrudController extends AbstractCrudController
{
    use  Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Cursus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id_cursus')
                ->onlyOnIndex(),
            TextField::new('name_cursus'),
            MoneyField::new('price')->setCurrency('EUR'),
            AssociationField::new('theme')
                ->setCrudController(ThemeCrudController::class)
                ->setLabel('Thème')
                ->setFormTypeOptions(['placeholder' => 'Selectionner un theme ']),
            
            CollectionField::new('lesson')
                ->hideWhenCreating(),

            DateTimeField::new('createdAt', 'Créer le ')
                ->hideOnForm()
                ->hideWhenCreating(),
            DateTimeField::new('updatedAt', 'Mis à jour le')
                ->hideOnForm()
                ->hideWhenCreating(),
        ];
    }
    
}
