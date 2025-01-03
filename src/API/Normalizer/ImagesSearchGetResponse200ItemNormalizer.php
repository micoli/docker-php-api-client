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

class ImagesSearchGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ImagesSearchGetResponse200Item';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ImagesSearchGetResponse200Item';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ImagesSearchGetResponse200Item();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
            unset($data['description']);
        } elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('is_official', $data) && $data['is_official'] !== null) {
            $object->setIsOfficial($data['is_official']);
            unset($data['is_official']);
        } elseif (\array_key_exists('is_official', $data) && $data['is_official'] === null) {
            $object->setIsOfficial(null);
        }
        if (\array_key_exists('is_automated', $data) && $data['is_automated'] !== null) {
            $object->setIsAutomated($data['is_automated']);
            unset($data['is_automated']);
        } elseif (\array_key_exists('is_automated', $data) && $data['is_automated'] === null) {
            $object->setIsAutomated(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('star_count', $data) && $data['star_count'] !== null) {
            $object->setStarCount($data['star_count']);
            unset($data['star_count']);
        } elseif (\array_key_exists('star_count', $data) && $data['star_count'] === null) {
            $object->setStarCount(null);
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
        if ($object->isInitialized('description') && $object->getDescription() !== null) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('isOfficial') && $object->getIsOfficial() !== null) {
            $data['is_official'] = $object->getIsOfficial();
        }
        if ($object->isInitialized('isAutomated') && $object->getIsAutomated() !== null) {
            $data['is_automated'] = $object->getIsAutomated();
        }
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('starCount') && $object->getStarCount() !== null) {
            $data['star_count'] = $object->getStarCount();
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
        return ['Docker\\API\\Model\\ImagesSearchGetResponse200Item' => false];
    }
}
