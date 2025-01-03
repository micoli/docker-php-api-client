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

class NetworksCreatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\NetworksCreatePostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\NetworksCreatePostBody';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworksCreatePostBody();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('CheckDuplicate', $data) && $data['CheckDuplicate'] !== null) {
            $object->setCheckDuplicate($data['CheckDuplicate']);
            unset($data['CheckDuplicate']);
        } elseif (\array_key_exists('CheckDuplicate', $data) && $data['CheckDuplicate'] === null) {
            $object->setCheckDuplicate(null);
        }
        if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
            $object->setDriver(null);
        }
        if (\array_key_exists('Internal', $data) && $data['Internal'] !== null) {
            $object->setInternal($data['Internal']);
            unset($data['Internal']);
        } elseif (\array_key_exists('Internal', $data) && $data['Internal'] === null) {
            $object->setInternal(null);
        }
        if (\array_key_exists('Attachable', $data) && $data['Attachable'] !== null) {
            $object->setAttachable($data['Attachable']);
            unset($data['Attachable']);
        } elseif (\array_key_exists('Attachable', $data) && $data['Attachable'] === null) {
            $object->setAttachable(null);
        }
        if (\array_key_exists('Ingress', $data) && $data['Ingress'] !== null) {
            $object->setIngress($data['Ingress']);
            unset($data['Ingress']);
        } elseif (\array_key_exists('Ingress', $data) && $data['Ingress'] === null) {
            $object->setIngress(null);
        }
        if (\array_key_exists('IPAM', $data) && $data['IPAM'] !== null) {
            $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], 'Docker\\API\\Model\\IPAM', 'json', $context));
            unset($data['IPAM']);
        } elseif (\array_key_exists('IPAM', $data) && $data['IPAM'] === null) {
            $object->setIPAM(null);
        }
        if (\array_key_exists('EnableIPv6', $data) && $data['EnableIPv6'] !== null) {
            $object->setEnableIPv6($data['EnableIPv6']);
            unset($data['EnableIPv6']);
        } elseif (\array_key_exists('EnableIPv6', $data) && $data['EnableIPv6'] === null) {
            $object->setEnableIPv6(null);
        }
        if (\array_key_exists('Options', $data) && $data['Options'] !== null) {
            $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setOptions($values);
            unset($data['Options']);
        } elseif (\array_key_exists('Options', $data) && $data['Options'] === null) {
            $object->setOptions(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setLabels($values_1);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        foreach ($data as $key_2 => $value_2) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_2;
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
        $data['Name'] = $object->getName();
        if ($object->isInitialized('checkDuplicate') && $object->getCheckDuplicate() !== null) {
            $data['CheckDuplicate'] = $object->getCheckDuplicate();
        }
        if ($object->isInitialized('driver') && $object->getDriver() !== null) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('internal') && $object->getInternal() !== null) {
            $data['Internal'] = $object->getInternal();
        }
        if ($object->isInitialized('attachable') && $object->getAttachable() !== null) {
            $data['Attachable'] = $object->getAttachable();
        }
        if ($object->isInitialized('ingress') && $object->getIngress() !== null) {
            $data['Ingress'] = $object->getIngress();
        }
        if ($object->isInitialized('iPAM') && $object->getIPAM() !== null) {
            $data['IPAM'] = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
        }
        if ($object->isInitialized('enableIPv6') && $object->getEnableIPv6() !== null) {
            $data['EnableIPv6'] = $object->getEnableIPv6();
        }
        if ($object->isInitialized('options') && $object->getOptions() !== null) {
            $values = [];
            foreach ($object->getOptions() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Options'] = $values;
        }
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values_1 = [];
            foreach ($object->getLabels() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Labels'] = $values_1;
        }
        foreach ($object as $key_2 => $value_2) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_2;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\NetworksCreatePostBody' => false];
    }
}
