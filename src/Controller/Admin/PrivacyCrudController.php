<?php

namespace App\Controller\Admin;

use App\Entity\Privacy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrivacyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Privacy::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
