<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use ArrayObject;
use DateTime;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HealthcheckResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\HealthcheckResult';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\HealthcheckResult';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\HealthcheckResult();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Start', $data) && $data['Start'] !== null) {
            $object->setStart(DateTime::createFromFormat('Y-m-d\\TH:i:s.uuP', $data['Start']));
            unset($data['Start']);
        } elseif (\array_key_exists('Start', $data) && $data['Start'] === null) {
            $object->setStart(null);
        }
        if (\array_key_exists('End', $data) && $data['End'] !== null) {
            $object->setEnd($data['End']);
            unset($data['End']);
        } elseif (\array_key_exists('End', $data) && $data['End'] === null) {
            $object->setEnd(null);
        }
        if (\array_key_exists('ExitCode', $data) && $data['ExitCode'] !== null) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && $data['ExitCode'] === null) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('Output', $data) && $data['Output'] !== null) {
            $object->setOutput($data['Output']);
            unset($data['Output']);
        } elseif (\array_key_exists('Output', $data) && $data['Output'] === null) {
            $object->setOutput(null);
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
        if ($object->isInitialized('start') && $object->getStart() !== null) {
            $data['Start'] = $object->getStart()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('end') && $object->getEnd() !== null) {
            $data['End'] = $object->getEnd();
        }
        if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('output') && $object->getOutput() !== null) {
            $data['Output'] = $object->getOutput();
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
        return ['Docker\\API\\Model\\HealthcheckResult' => false];
    }
}
