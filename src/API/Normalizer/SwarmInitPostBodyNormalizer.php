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

class SwarmInitPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\SwarmInitPostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\SwarmInitPostBody';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmInitPostBody();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] !== null) {
            $object->setListenAddr($data['ListenAddr']);
            unset($data['ListenAddr']);
        } elseif (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] === null) {
            $object->setListenAddr(null);
        }
        if (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] !== null) {
            $object->setAdvertiseAddr($data['AdvertiseAddr']);
            unset($data['AdvertiseAddr']);
        } elseif (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] === null) {
            $object->setAdvertiseAddr(null);
        }
        if (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] !== null) {
            $object->setDataPathAddr($data['DataPathAddr']);
            unset($data['DataPathAddr']);
        } elseif (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] === null) {
            $object->setDataPathAddr(null);
        }
        if (\array_key_exists('DataPathPort', $data) && $data['DataPathPort'] !== null) {
            $object->setDataPathPort($data['DataPathPort']);
            unset($data['DataPathPort']);
        } elseif (\array_key_exists('DataPathPort', $data) && $data['DataPathPort'] === null) {
            $object->setDataPathPort(null);
        }
        if (\array_key_exists('DefaultAddrPool', $data) && $data['DefaultAddrPool'] !== null) {
            $values = [];
            foreach ($data['DefaultAddrPool'] as $value) {
                $values[] = $value;
            }
            $object->setDefaultAddrPool($values);
            unset($data['DefaultAddrPool']);
        } elseif (\array_key_exists('DefaultAddrPool', $data) && $data['DefaultAddrPool'] === null) {
            $object->setDefaultAddrPool(null);
        }
        if (\array_key_exists('ForceNewCluster', $data) && $data['ForceNewCluster'] !== null) {
            $object->setForceNewCluster($data['ForceNewCluster']);
            unset($data['ForceNewCluster']);
        } elseif (\array_key_exists('ForceNewCluster', $data) && $data['ForceNewCluster'] === null) {
            $object->setForceNewCluster(null);
        }
        if (\array_key_exists('SubnetSize', $data) && $data['SubnetSize'] !== null) {
            $object->setSubnetSize($data['SubnetSize']);
            unset($data['SubnetSize']);
        } elseif (\array_key_exists('SubnetSize', $data) && $data['SubnetSize'] === null) {
            $object->setSubnetSize(null);
        }
        if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\SwarmSpec', 'json', $context));
            unset($data['Spec']);
        } elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
            $object->setSpec(null);
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
        if ($object->isInitialized('listenAddr') && $object->getListenAddr() !== null) {
            $data['ListenAddr'] = $object->getListenAddr();
        }
        if ($object->isInitialized('advertiseAddr') && $object->getAdvertiseAddr() !== null) {
            $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
        }
        if ($object->isInitialized('dataPathAddr') && $object->getDataPathAddr() !== null) {
            $data['DataPathAddr'] = $object->getDataPathAddr();
        }
        if ($object->isInitialized('dataPathPort') && $object->getDataPathPort() !== null) {
            $data['DataPathPort'] = $object->getDataPathPort();
        }
        if ($object->isInitialized('defaultAddrPool') && $object->getDefaultAddrPool() !== null) {
            $values = [];
            foreach ($object->getDefaultAddrPool() as $value) {
                $values[] = $value;
            }
            $data['DefaultAddrPool'] = $values;
        }
        if ($object->isInitialized('forceNewCluster') && $object->getForceNewCluster() !== null) {
            $data['ForceNewCluster'] = $object->getForceNewCluster();
        }
        if ($object->isInitialized('subnetSize') && $object->getSubnetSize() !== null) {
            $data['SubnetSize'] = $object->getSubnetSize();
        }
        if ($object->isInitialized('spec') && $object->getSpec() !== null) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
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
        return ['Docker\\API\\Model\\SwarmInitPostBody' => false];
    }
}
