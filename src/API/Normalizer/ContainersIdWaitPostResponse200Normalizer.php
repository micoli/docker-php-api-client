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

class ContainersIdWaitPostResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ContainersIdWaitPostResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ContainersIdWaitPostResponse200';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainersIdWaitPostResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('StatusCode', $data) && $data['StatusCode'] !== null) {
            $object->setStatusCode($data['StatusCode']);
            unset($data['StatusCode']);
        } elseif (\array_key_exists('StatusCode', $data) && $data['StatusCode'] === null) {
            $object->setStatusCode(null);
        }
        if (\array_key_exists('Error', $data) && $data['Error'] !== null) {
            $object->setError($this->denormalizer->denormalize($data['Error'], 'Docker\\API\\Model\\ContainersIdWaitPostResponse200Error', 'json', $context));
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && $data['Error'] === null) {
            $object->setError(null);
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
        $data['StatusCode'] = $object->getStatusCode();
        if ($object->isInitialized('error') && $object->getError() !== null) {
            $data['Error'] = $this->normalizer->normalize($object->getError(), 'json', $context);
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
        return ['Docker\\API\\Model\\ContainersIdWaitPostResponse200' => false];
    }
}
