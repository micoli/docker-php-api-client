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

class ServiceServiceStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ServiceServiceStatus';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ServiceServiceStatus';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceServiceStatus();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] !== null) {
            $object->setRunningTasks($data['RunningTasks']);
            unset($data['RunningTasks']);
        } elseif (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] === null) {
            $object->setRunningTasks(null);
        }
        if (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] !== null) {
            $object->setDesiredTasks($data['DesiredTasks']);
            unset($data['DesiredTasks']);
        } elseif (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] === null) {
            $object->setDesiredTasks(null);
        }
        if (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] !== null) {
            $object->setCompletedTasks($data['CompletedTasks']);
            unset($data['CompletedTasks']);
        } elseif (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] === null) {
            $object->setCompletedTasks(null);
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
        if ($object->isInitialized('runningTasks') && $object->getRunningTasks() !== null) {
            $data['RunningTasks'] = $object->getRunningTasks();
        }
        if ($object->isInitialized('desiredTasks') && $object->getDesiredTasks() !== null) {
            $data['DesiredTasks'] = $object->getDesiredTasks();
        }
        if ($object->isInitialized('completedTasks') && $object->getCompletedTasks() !== null) {
            $data['CompletedTasks'] = $object->getCompletedTasks();
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
        return ['Docker\\API\\Model\\ServiceServiceStatus' => false];
    }
}
