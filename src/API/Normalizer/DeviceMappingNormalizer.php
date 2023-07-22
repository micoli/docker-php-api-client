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

class DeviceMappingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\DeviceMapping';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\DeviceMapping';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\DeviceMapping();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('PathOnHost', $data) && $data['PathOnHost'] !== null) {
            $object->setPathOnHost($data['PathOnHost']);
            unset($data['PathOnHost']);
        } elseif (\array_key_exists('PathOnHost', $data) && $data['PathOnHost'] === null) {
            $object->setPathOnHost(null);
        }
        if (\array_key_exists('PathInContainer', $data) && $data['PathInContainer'] !== null) {
            $object->setPathInContainer($data['PathInContainer']);
            unset($data['PathInContainer']);
        } elseif (\array_key_exists('PathInContainer', $data) && $data['PathInContainer'] === null) {
            $object->setPathInContainer(null);
        }
        if (\array_key_exists('CgroupPermissions', $data) && $data['CgroupPermissions'] !== null) {
            $object->setCgroupPermissions($data['CgroupPermissions']);
            unset($data['CgroupPermissions']);
        } elseif (\array_key_exists('CgroupPermissions', $data) && $data['CgroupPermissions'] === null) {
            $object->setCgroupPermissions(null);
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
        if ($object->isInitialized('pathOnHost') && $object->getPathOnHost() !== null) {
            $data['PathOnHost'] = $object->getPathOnHost();
        }
        if ($object->isInitialized('pathInContainer') && $object->getPathInContainer() !== null) {
            $data['PathInContainer'] = $object->getPathInContainer();
        }
        if ($object->isInitialized('cgroupPermissions') && $object->getCgroupPermissions() !== null) {
            $data['CgroupPermissions'] = $object->getCgroupPermissions();
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
        return ['Docker\\API\\Model\\DeviceMapping' => false];
    }
}
