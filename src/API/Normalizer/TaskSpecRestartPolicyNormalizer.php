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

class TaskSpecRestartPolicyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecRestartPolicy';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\TaskSpecRestartPolicy';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecRestartPolicy();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Condition', $data) && $data['Condition'] !== null) {
            $object->setCondition($data['Condition']);
            unset($data['Condition']);
        } elseif (\array_key_exists('Condition', $data) && $data['Condition'] === null) {
            $object->setCondition(null);
        }
        if (\array_key_exists('Delay', $data) && $data['Delay'] !== null) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        } elseif (\array_key_exists('Delay', $data) && $data['Delay'] === null) {
            $object->setDelay(null);
        }
        if (\array_key_exists('MaxAttempts', $data) && $data['MaxAttempts'] !== null) {
            $object->setMaxAttempts($data['MaxAttempts']);
            unset($data['MaxAttempts']);
        } elseif (\array_key_exists('MaxAttempts', $data) && $data['MaxAttempts'] === null) {
            $object->setMaxAttempts(null);
        }
        if (\array_key_exists('Window', $data) && $data['Window'] !== null) {
            $object->setWindow($data['Window']);
            unset($data['Window']);
        } elseif (\array_key_exists('Window', $data) && $data['Window'] === null) {
            $object->setWindow(null);
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
        if ($object->isInitialized('condition') && $object->getCondition() !== null) {
            $data['Condition'] = $object->getCondition();
        }
        if ($object->isInitialized('delay') && $object->getDelay() !== null) {
            $data['Delay'] = $object->getDelay();
        }
        if ($object->isInitialized('maxAttempts') && $object->getMaxAttempts() !== null) {
            $data['MaxAttempts'] = $object->getMaxAttempts();
        }
        if ($object->isInitialized('window') && $object->getWindow() !== null) {
            $data['Window'] = $object->getWindow();
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
        return ['Docker\\API\\Model\\TaskSpecRestartPolicy' => false];
    }
}
