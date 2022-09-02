<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PartenaireRepository::class)]
class Partenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\NotNull()]
    #[Assert\Length(min:2, max:50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 100, nullable: true)]
    
    private ?string $shortDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    
    private ?string $fullDescription = null;

    #[ORM\Column(length: 100, nullable: true)]
   
    private ?string $logoUrl = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $dpo = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $technicalContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $commercialContact = null;

    #[ORM\Column]
    private ?bool $membersRead = null;

    #[ORM\Column]
    private ?bool $membersWrite = null;

    #[ORM\Column]
    private ?bool $membersProduct = null;

    #[ORM\Column]
    private ?bool $membersPayment = null;

    #[ORM\Column]
    private ?bool $membersStat = null;

    #[ORM\Column]
    private ?bool $membersSubscription = null;

    #[ORM\Column]
    private ?bool $paymentSchedulesRead = null;

    #[ORM\Column]
    private ?bool $paymentSchedulesWrite = null;

    #[ORM\Column]
    private ?bool $paymentDaysRead = null;

    #[ORM\Column]
    private ?bool $paymentDayWrite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(?string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;

        return $this;
    }

    public function getDpo(): ?string
    {
        return $this->dpo;
    }

    public function setDpo(?string $dpo): self
    {
        $this->dpo = $dpo;

        return $this;
    }

    public function getTechnicalContact(): ?string
    {
        return $this->technicalContact;
    }

    public function setTechnicalContact(?string $technicalContact): self
    {
        $this->technicalContact = $technicalContact;

        return $this;
    }

    public function getCommercialContact(): ?string
    {
        return $this->commercialContact;
    }

    public function setCommercialContact(?string $commercialContact): self
    {
        $this->commercialContact = $commercialContact;

        return $this;
    }

    public function isMembersRead(): ?bool
    {
        return $this->membersRead;
    }

    public function setMembersRead(bool $membersRead): self
    {
        $this->membersRead = $membersRead;

        return $this;
    }

    public function isMembersWrite(): ?bool
    {
        return $this->membersWrite;
    }

    public function setMembersWrite(bool $membersWrite): self
    {
        $this->membersWrite = $membersWrite;

        return $this;
    }

    public function isMembersProduct(): ?bool
    {
        return $this->membersProduct;
    }

    public function setMembersProduct(bool $membersProduct): self
    {
        $this->membersProduct = $membersProduct;

        return $this;
    }

    public function isMembersPayment(): ?bool
    {
        return $this->membersPayment;
    }

    public function setMembersPayment(bool $membersPayment): self
    {
        $this->membersPayment = $membersPayment;

        return $this;
    }

    public function isMembersStat(): ?bool
    {
        return $this->membersStat;
    }

    public function setMembersStat(bool $membersStat): self
    {
        $this->membersStat = $membersStat;

        return $this;
    }

    public function getMembersSubscription(): ?bool
    {
        return $this->membersSubscription;
    }

    public function setMembersSubscription(bool $membersSubscription): self
    {
        $this->membersSubscription = $membersSubscription;

        return $this;
    }

    public function isPaymentSchedulesRead(): ?bool
    {
        return $this->paymentSchedulesRead;
    }

    public function setPaymentSchedulesRead(bool $paymentSchedulesRead): self
    {
        $this->paymentSchedulesRead = $paymentSchedulesRead;

        return $this;
    }

    public function isPaymentSchedulesWrite(): ?bool
    {
        return $this->paymentSchedulesWrite;
    }

    public function setPaymentSchedulesWrite(bool $paymentSchedulesWrite): self
    {
        $this->paymentSchedulesWrite = $paymentSchedulesWrite;

        return $this;
    }

    public function isPaymentDaysRead(): ?bool
    {
        return $this->paymentDaysRead;
    }

    public function setPaymentDaysRead(bool $paymentDaysRead): self
    {
        $this->paymentDaysRead = $paymentDaysRead;

        return $this;
    }

    public function isPaymentDayWrite(): ?bool
    {
        return $this->paymentDayWrite;
    }

    public function setPaymentDayWrite(bool $paymentDayWrite): self
    {
        $this->paymentDayWrite = $paymentDayWrite;

        return $this;
    }
}
