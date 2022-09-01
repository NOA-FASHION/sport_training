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
    #[Assert\LessThan(100)]
    private ?string $short_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\LessThan(100)]
    private ?string $full_description = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\LessThan(100)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $dpo = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $technical_contact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $commercial_contact = null;

    #[ORM\Column]
    private ?bool $members_read = null;

    #[ORM\Column]
    private ?bool $members_write = null;

    #[ORM\Column]
    private ?bool $members_product = null;

    #[ORM\Column]
    private ?bool $members_payment = null;

    #[ORM\Column]
    private ?bool $members_stat = null;

    #[ORM\Column]
    private ?bool $members_subscription = null;

    #[ORM\Column]
    private ?bool $payment_schedules_read = null;

    #[ORM\Column]
    private ?bool $payment_schedules_write = null;

    #[ORM\Column]
    private ?bool $payment_days_read = null;

    #[ORM\Column]
    private ?bool $payment_day_write = null;

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
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->full_description;
    }

    public function setFullDescription(?string $full_description): self
    {
        $this->full_description = $full_description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): self
    {
        $this->logo_url = $logo_url;

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
        return $this->technical_contact;
    }

    public function setTechnicalContact(?string $technical_contact): self
    {
        $this->technical_contact = $technical_contact;

        return $this;
    }

    public function getCommercialContact(): ?string
    {
        return $this->commercial_contact;
    }

    public function setCommercialContact(?string $commercial_contact): self
    {
        $this->commercial_contact = $commercial_contact;

        return $this;
    }

    public function isMembersRead(): ?bool
    {
        return $this->members_read;
    }

    public function setMembersRead(bool $members_read): self
    {
        $this->members_read = $members_read;

        return $this;
    }

    public function isMembersWrite(): ?bool
    {
        return $this->members_write;
    }

    public function setMembersWrite(bool $members_write): self
    {
        $this->members_write = $members_write;

        return $this;
    }

    public function isMembersProduct(): ?bool
    {
        return $this->members_product;
    }

    public function setMembersProduct(bool $members_product): self
    {
        $this->members_product = $members_product;

        return $this;
    }

    public function isMembersPayment(): ?bool
    {
        return $this->members_payment;
    }

    public function setMembersPayment(bool $members_payment): self
    {
        $this->members_payment = $members_payment;

        return $this;
    }

    public function isMembersStat(): ?bool
    {
        return $this->members_stat;
    }

    public function setMembersStat(bool $members_stat): self
    {
        $this->members_stat = $members_stat;

        return $this;
    }

    public function getMembersSubscription(): ?bool
    {
        return $this->members_subscription;
    }

    public function setMembersSubscription(bool $members_subscription): self
    {
        $this->members_subscription = $members_subscription;

        return $this;
    }

    public function isPaymentSchedulesRead(): ?bool
    {
        return $this->payment_schedules_read;
    }

    public function setPaymentSchedulesRead(bool $payment_schedules_read): self
    {
        $this->payment_schedules_read = $payment_schedules_read;

        return $this;
    }

    public function isPaymentSchedulesWrite(): ?bool
    {
        return $this->payment_schedules_write;
    }

    public function setPaymentSchedulesWrite(bool $payment_schedules_write): self
    {
        $this->payment_schedules_write = $payment_schedules_write;

        return $this;
    }

    public function isPaymentDaysRead(): ?bool
    {
        return $this->payment_days_read;
    }

    public function setPaymentDaysRead(bool $payment_days_read): self
    {
        $this->payment_days_read = $payment_days_read;

        return $this;
    }

    public function isPaymentDayWrite(): ?bool
    {
        return $this->payment_day_write;
    }

    public function setPaymentDayWrite(bool $payment_day_write): self
    {
        $this->payment_day_write = $payment_day_write;

        return $this;
    }
}
