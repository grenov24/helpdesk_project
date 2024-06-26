<?php

namespace App\Entity;

use App\Repository\RequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\SluggerInterface;

#[ORM\Entity(repositoryClass: RequestRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_SLUG', fields: ['slug'])]
#[ORM\HasLifecycleCallbacks]
class Request
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $date_created = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'requests')]
    private ?User $technician = null;

    #[ORM\ManyToOne(inversedBy: 'requests')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'requests')]
    private ?Status $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_name = null;

    #[ORM\Column(length: 255)]
    private ?string $user_email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ev_number = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'request', orphanRemoval: true)]
    private Collection $comments;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_phone = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setDateCreatedValue(): void
    {
        $this->date_created = new \DateTimeImmutable();
    } 
    //vytvařet slug z generovaného ID?
    //je možnost ID upravit, nebo je lepší vytvořit novou
    //tabulku jen pro speciální ID? (20240001,20240002)
    //zatím ponechám vytvaření z name kvůli seedu databáze
    public function createSlug(SluggerInterface $slugger): void
    {
        $this->slug = $slugger->slug($this->name);
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeImmutable
    {
        return $this->date_created;
    }

    public function setDateCreated(\DateTimeImmutable $date_created): static
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTechnician(): ?User
    {
        return $this->technician;
    }

    public function setTechnician(?User $technician): static
    {
        $this->technician = $technician;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUsername(?string $user_name): static
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): static
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getEvNumber(): ?string
    {
        return $this->ev_number;
    }

    public function setEvNumber(?string $ev_number): static
    {
        $this->ev_number = $ev_number;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setRequest($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRequest() === $this) {
                $comment->setRequest(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUserPhone(): ?string
    {
        return $this->user_phone;
    }

    public function setUserPhone(?string $user_phone): static
    {
        $this->user_phone = $user_phone;

        return $this;
    }
}
