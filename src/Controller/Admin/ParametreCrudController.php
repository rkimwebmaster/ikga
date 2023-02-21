<?php

namespace App\Controller\Admin;

use App\Entity\Parametre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ParametreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Parametre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomEntreprise'),
            TextField::new('slogan'),
            ImageField::new('logo')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            TextField::new('phoneNumber'),
            TextField::new('whatsappNumber'),
            TextField::new('linkedIn'),
            TextField::new('twitter'),
            TextField::new('email'),
            TextField::new('adresse'),
            ImageField::new('newsbg389x454')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('menuBanner295x320Premier')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('menuBanner295x320Deuxieme')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('menuBanner295x320Troisieme')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('mainBanner1903x650Un')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
            ImageField::new('mainBanner1903x650Deux')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),
        ];
    }
    
}
