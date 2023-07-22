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

class DistributionNameJsonGetResponse200DescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\DistributionNameJsonGetResponse200Descriptor();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('MediaType', $data) && $data['MediaType'] !== null) {
            $object->setMediaType($data['MediaType']);
            unset($data['MediaType']);
        } elseif (\array_key_exists('MediaType', $data) && $data['MediaType'] === null) {
            $object->setMediaType(null);
        }
        if (\array_key_exists('Size', $data) && $data['Size'] !== null) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && $data['Size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('Digest', $data) && $data['Digest'] !== null) {
            $object->setDigest($data['Digest']);
            unset($data['Digest']);
        } elseif (\array_key_exists('Digest', $data) && $data['Digest'] === null) {
            $object->setDigest(null);
        }
        if (\array_key_exists('URLs', $data) && $data['URLs'] !== null) {
            $values = [];
            foreach ($data['URLs'] as $value) {
                $values[] = $value;
            }
            $object->setURLs($values);
            unset($data['URLs']);
        } elseif (\array_key_exists('URLs', $data) && $data['URLs'] === null) {
            $object->setURLs(null);
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
        if ($object->isInitialized('mediaType') && $object->getMediaType() !== null) {
            $data['MediaType'] = $object->getMediaType();
        }
        if ($object->isInitialized('size') && $object->getSize() !== null) {
            $data['Size'] = $object->getSize();
        }
        if ($object->isInitialized('digest') && $object->getDigest() !== null) {
            $data['Digest'] = $object->getDigest();
        }
        if ($object->isInitialized('uRLs') && $object->getURLs() !== null) {
            $values = [];
            foreach ($object->getURLs() as $value) {
                $values[] = $value;
            }
            $data['URLs'] = $values;
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
        return ['Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor' => false];
    }
}
