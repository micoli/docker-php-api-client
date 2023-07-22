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

class ServiceSpecModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ServiceSpecMode';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ServiceSpecMode';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecMode();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Replicated', $data) && $data['Replicated'] !== null) {
            $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Docker\\API\\Model\\ServiceSpecModeReplicated', 'json', $context));
            unset($data['Replicated']);
        } elseif (\array_key_exists('Replicated', $data) && $data['Replicated'] === null) {
            $object->setReplicated(null);
        }
        if (\array_key_exists('Global', $data) && $data['Global'] !== null) {
            $object->setGlobal($this->denormalizer->denormalize($data['Global'], 'Docker\\API\\Model\\ServiceSpecModeGlobal', 'json', $context));
            unset($data['Global']);
        } elseif (\array_key_exists('Global', $data) && $data['Global'] === null) {
            $object->setGlobal(null);
        }
        if (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] !== null) {
            $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Docker\\API\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
            unset($data['ReplicatedJob']);
        } elseif (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] === null) {
            $object->setReplicatedJob(null);
        }
        if (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] !== null) {
            $object->setGlobalJob($this->denormalizer->denormalize($data['GlobalJob'], 'Docker\\API\\Model\\ServiceSpecModeGlobalJob', 'json', $context));
            unset($data['GlobalJob']);
        } elseif (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] === null) {
            $object->setGlobalJob(null);
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
        if ($object->isInitialized('replicated') && $object->getReplicated() !== null) {
            $data['Replicated'] = $this->normalizer->normalize($object->getReplicated(), 'json', $context);
        }
        if ($object->isInitialized('global') && $object->getGlobal() !== null) {
            $data['Global'] = $this->normalizer->normalize($object->getGlobal(), 'json', $context);
        }
        if ($object->isInitialized('replicatedJob') && $object->getReplicatedJob() !== null) {
            $data['ReplicatedJob'] = $this->normalizer->normalize($object->getReplicatedJob(), 'json', $context);
        }
        if ($object->isInitialized('globalJob') && $object->getGlobalJob() !== null) {
            $data['GlobalJob'] = $this->normalizer->normalize($object->getGlobalJob(), 'json', $context);
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
        return ['Docker\\API\\Model\\ServiceSpecMode' => false];
    }
}
