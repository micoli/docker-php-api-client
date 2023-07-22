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

class ResourceObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ResourceObject';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ResourceObject';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ResourceObject();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] !== null) {
            $object->setNanoCPUs($data['NanoCPUs']);
            unset($data['NanoCPUs']);
        } elseif (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] === null) {
            $object->setNanoCPUs(null);
        }
        if (\array_key_exists('MemoryBytes', $data) && $data['MemoryBytes'] !== null) {
            $object->setMemoryBytes($data['MemoryBytes']);
            unset($data['MemoryBytes']);
        } elseif (\array_key_exists('MemoryBytes', $data) && $data['MemoryBytes'] === null) {
            $object->setMemoryBytes(null);
        }
        if (\array_key_exists('GenericResources', $data) && $data['GenericResources'] !== null) {
            $values = [];
            foreach ($data['GenericResources'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\GenericResourcesItem', 'json', $context);
            }
            $object->setGenericResources($values);
            unset($data['GenericResources']);
        } elseif (\array_key_exists('GenericResources', $data) && $data['GenericResources'] === null) {
            $object->setGenericResources(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('nanoCPUs') && $object->getNanoCPUs() !== null) {
            $data['NanoCPUs'] = $object->getNanoCPUs();
        }
        if ($object->isInitialized('memoryBytes') && $object->getMemoryBytes() !== null) {
            $data['MemoryBytes'] = $object->getMemoryBytes();
        }
        if ($object->isInitialized('genericResources') && $object->getGenericResources() !== null) {
            $values = [];
            foreach ($object->getGenericResources() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['GenericResources'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ResourceObject' => false];
    }
}
