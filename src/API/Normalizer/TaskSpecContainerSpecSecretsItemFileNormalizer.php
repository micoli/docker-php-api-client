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

class TaskSpecContainerSpecSecretsItemFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItemFile';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItemFile';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecSecretsItemFile();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('UID', $data) && $data['UID'] !== null) {
            $object->setUID($data['UID']);
            unset($data['UID']);
        } elseif (\array_key_exists('UID', $data) && $data['UID'] === null) {
            $object->setUID(null);
        }
        if (\array_key_exists('GID', $data) && $data['GID'] !== null) {
            $object->setGID($data['GID']);
            unset($data['GID']);
        } elseif (\array_key_exists('GID', $data) && $data['GID'] === null) {
            $object->setGID(null);
        }
        if (\array_key_exists('Mode', $data) && $data['Mode'] !== null) {
            $object->setMode($data['Mode']);
            unset($data['Mode']);
        } elseif (\array_key_exists('Mode', $data) && $data['Mode'] === null) {
            $object->setMode(null);
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
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('uID') && $object->getUID() !== null) {
            $data['UID'] = $object->getUID();
        }
        if ($object->isInitialized('gID') && $object->getGID() !== null) {
            $data['GID'] = $object->getGID();
        }
        if ($object->isInitialized('mode') && $object->getMode() !== null) {
            $data['Mode'] = $object->getMode();
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
        return ['Docker\\API\\Model\\TaskSpecContainerSpecSecretsItemFile' => false];
    }
}
