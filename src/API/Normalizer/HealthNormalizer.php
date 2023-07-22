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

class HealthNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\Health';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\Health';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Health();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] !== null) {
            $object->setFailingStreak($data['FailingStreak']);
            unset($data['FailingStreak']);
        } elseif (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] === null) {
            $object->setFailingStreak(null);
        }
        if (\array_key_exists('Log', $data) && $data['Log'] !== null) {
            $values = [];
            foreach ($data['Log'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\HealthcheckResult', 'json', $context);
            }
            $object->setLog($values);
            unset($data['Log']);
        } elseif (\array_key_exists('Log', $data) && $data['Log'] === null) {
            $object->setLog(null);
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
        if ($object->isInitialized('status') && $object->getStatus() !== null) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('failingStreak') && $object->getFailingStreak() !== null) {
            $data['FailingStreak'] = $object->getFailingStreak();
        }
        if ($object->isInitialized('log') && $object->getLog() !== null) {
            $values = [];
            foreach ($object->getLog() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Log'] = $values;
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
        return ['Docker\\API\\Model\\Health' => false];
    }
}
