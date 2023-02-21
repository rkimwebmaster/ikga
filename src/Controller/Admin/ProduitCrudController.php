<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation'),
            AssociationField::new('categorie'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency("CDF"),
            ImageField::new('Photo624x800Premier')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('Photo624x800Deuxieme')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),

        ];
    }
    
}
