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

class RegistryServiceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\RegistryServiceConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\RegistryServiceConfig';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\RegistryServiceConfig();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && $data['AllowNondistributableArtifactsCIDRs'] !== null) {
            $values = [];
            foreach ($data['AllowNondistributableArtifactsCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setAllowNondistributableArtifactsCIDRs($values);
            unset($data['AllowNondistributableArtifactsCIDRs']);
        } elseif (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && $data['AllowNondistributableArtifactsCIDRs'] === null) {
            $object->setAllowNondistributableArtifactsCIDRs(null);
        }
        if (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && $data['AllowNondistributableArtifactsHostnames'] !== null) {
            $values_1 = [];
            foreach ($data['AllowNondistributableArtifactsHostnames'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAllowNondistributableArtifactsHostnames($values_1);
            unset($data['AllowNondistributableArtifactsHostnames']);
        } elseif (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && $data['AllowNondistributableArtifactsHostnames'] === null) {
            $object->setAllowNondistributableArtifactsHostnames(null);
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data) && $data['InsecureRegistryCIDRs'] !== null) {
            $values_2 = [];
            foreach ($data['InsecureRegistryCIDRs'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setInsecureRegistryCIDRs($values_2);
            unset($data['InsecureRegistryCIDRs']);
        } elseif (\array_key_exists('InsecureRegistryCIDRs', $data) && $data['InsecureRegistryCIDRs'] === null) {
            $object->setInsecureRegistryCIDRs(null);
        }
        if (\array_key_exists('IndexConfigs', $data) && $data['IndexConfigs'] !== null) {
            $values_3 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['IndexConfigs'] as $key => $value_3) {
                $values_3[$key] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\IndexInfo', 'json', $context);
            }
            $object->setIndexConfigs($values_3);
            unset($data['IndexConfigs']);
        } elseif (\array_key_exists('IndexConfigs', $data) && $data['IndexConfigs'] === null) {
            $object->setIndexConfigs(null);
        }
        if (\array_key_exists('Mirrors', $data) && $data['Mirrors'] !== null) {
            $values_4 = [];
            foreach ($data['Mirrors'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setMirrors($values_4);
            unset($data['Mirrors']);
        } elseif (\array_key_exists('Mirrors', $data) && $data['Mirrors'] === null) {
            $object->setMirrors(null);
        }
        foreach ($data as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_5;
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
        if ($object->isInitialized('allowNondistributableArtifactsCIDRs') && $object->getAllowNondistributableArtifactsCIDRs() !== null) {
            $values = [];
            foreach ($object->getAllowNondistributableArtifactsCIDRs() as $value) {
                $values[] = $value;
            }
            $data['AllowNondistributableArtifactsCIDRs'] = $values;
        }
        if ($object->isInitialized('allowNondistributableArtifactsHostnames') && $object->getAllowNondistributableArtifactsHostnames() !== null) {
            $values_1 = [];
            foreach ($object->getAllowNondistributableArtifactsHostnames() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['AllowNondistributableArtifactsHostnames'] = $values_1;
        }
        if ($object->isInitialized('insecureRegistryCIDRs') && $object->getInsecureRegistryCIDRs() !== null) {
            $values_2 = [];
            foreach ($object->getInsecureRegistryCIDRs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['InsecureRegistryCIDRs'] = $values_2;
        }
        if ($object->isInitialized('indexConfigs') && $object->getIndexConfigs() !== null) {
            $values_3 = [];
            foreach ($object->getIndexConfigs() as $key => $value_3) {
                $values_3[$key] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['IndexConfigs'] = $values_3;
        }
        if ($object->isInitialized('mirrors') && $object->getMirrors() !== null) {
            $values_4 = [];
            foreach ($object->getMirrors() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Mirrors'] = $values_4;
        }
        foreach ($object as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_5;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\RegistryServiceConfig' => false];
    }
}
