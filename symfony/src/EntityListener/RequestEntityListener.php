<?php

declare(strict_types=1);

namespace App\EntityListener;

use App\Entity\Request;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, entity: Request::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Request::class)]
class RequestEntityListener extends EntityListenerWithSlugger 
{
    public function prePersist(Request $request, LifecycleEventArgs $event): void 
    {
        $request->createSlug($this->slugger);
    }

    public function preUpdate(Request $request, LifecycleEventArgs $event): void 
    {
        $request->createSlug($this->slugger);
    }
}