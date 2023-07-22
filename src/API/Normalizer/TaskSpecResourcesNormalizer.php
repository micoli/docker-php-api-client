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

class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecResources';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\TaskSpecResources';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecResources();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Limits', $data) && $data['Limits'] !== null) {
            $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Docker\\API\\Model\\Limit', 'json', $context));
            unset($data['Limits']);
        } elseif (\array_key_exists('Limits', $data) && $data['Limits'] === null) {
            $object->setLimits(null);
        }
        if (\array_key_exists('Reservation', $data) && $data['Reservation'] !== null) {
            $object->setReservation($this->denormalizer->denormalize($data['Reservation'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
            unset($data['Reservation']);
        } elseif (\array_key_exists('Reservation', $data) && $data['Reservation'] === null) {
            $object->setReservation(null);
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('limits') && $object->getLimits() !== null) {
            $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
        }
        if ($object->isInitialized('reservation') && $object->getReservation() !== null) {
            $data['Reservation'] = $this->normalizer->normalize($object->getReservation(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\TaskSpecResources' => false];
    }
}
