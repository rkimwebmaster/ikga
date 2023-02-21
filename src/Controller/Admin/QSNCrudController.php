<?php

namespace App\Controller\Admin;

use App\Entity\QSN;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QSNCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QSN::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextField::new('description'),
            TextEditorField::new('contenu'),
        ];
    }
    
}
