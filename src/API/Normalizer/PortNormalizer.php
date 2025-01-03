<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use ArrayObject;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\Port';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\Port';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Port();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('IP', $data) && $data['IP'] !== null) {
            $object->setIP($data['IP']);
            unset($data['IP']);
        } elseif (\array_key_exists('IP', $data) && $data['IP'] === null) {
            $object->setIP(null);
        }
        if (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] !== null) {
            $object->setPrivatePort($data['PrivatePort']);
            unset($data['PrivatePort']);
        } elseif (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] === null) {
            $object->setPrivatePort(null);
        }
        if (\array_key_exists('PublicPort', $data) && $data['PublicPort'] !== null) {
            $object->setPublicPort($data['PublicPort']);
            unset($data['PublicPort']);
        } elseif (\array_key_exists('PublicPort', $data) && $data['PublicPort'] === null) {
            $object->setPublicPort(null);
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|ArrayObject|null
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('iP') && $object->getIP() !== null) {
            $data['IP'] = $object->getIP();
        }
        $data['PrivatePort'] = $object->getPrivatePort();
        if ($object->isInitialized('publicPort') && $object->getPublicPort() !== null) {
            $data['PublicPort'] = $object->getPublicPort();
        }
        $data['Type'] = $object->getType();
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\Port' => false];
    }
}
