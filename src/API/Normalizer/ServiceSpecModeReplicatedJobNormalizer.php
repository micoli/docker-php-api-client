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

class ServiceSpecModeReplicatedJobNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ServiceSpecModeReplicatedJob';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ServiceSpecModeReplicatedJob';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecModeReplicatedJob();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('MaxConcurrent', $data) && $data['MaxConcurrent'] !== null) {
            $object->setMaxConcurrent($data['MaxConcurrent']);
            unset($data['MaxConcurrent']);
        } elseif (\array_key_exists('MaxConcurrent', $data) && $data['MaxConcurrent'] === null) {
            $object->setMaxConcurrent(null);
        }
        if (\array_key_exists('TotalCompletions', $data) && $data['TotalCompletions'] !== null) {
            $object->setTotalCompletions($data['TotalCompletions']);
            unset($data['TotalCompletions']);
        } elseif (\array_key_exists('TotalCompletions', $data) && $data['TotalCompletions'] === null) {
            $object->setTotalCompletions(null);
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
        if ($object->isInitialized('maxConcurrent') && $object->getMaxConcurrent() !== null) {
            $data['MaxConcurrent'] = $object->getMaxConcurrent();
        }
        if ($object->isInitialized('totalCompletions') && $object->getTotalCompletions() !== null) {
            $data['TotalCompletions'] = $object->getTotalCompletions();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\ServiceSpecModeReplicatedJob' => false];
    }
}
