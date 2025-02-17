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

class NetworkSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\NetworkSettings';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\NetworkSettings';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworkSettings();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Bridge', $data) && $data['Bridge'] !== null) {
            $object->setBridge($data['Bridge']);
            unset($data['Bridge']);
        } elseif (\array_key_exists('Bridge', $data) && $data['Bridge'] === null) {
            $object->setBridge(null);
        }
        if (\array_key_exists('SandboxID', $data) && $data['SandboxID'] !== null) {
            $object->setSandboxID($data['SandboxID']);
            unset($data['SandboxID']);
        } elseif (\array_key_exists('SandboxID', $data) && $data['SandboxID'] === null) {
            $object->setSandboxID(null);
        }
        if (\array_key_exists('HairpinMode', $data) && $data['HairpinMode'] !== null) {
            $object->setHairpinMode($data['HairpinMode']);
            unset($data['HairpinMode']);
        } elseif (\array_key_exists('HairpinMode', $data) && $data['HairpinMode'] === null) {
            $object->setHairpinMode(null);
        }
        if (\array_key_exists('LinkLocalIPv6Address', $data) && $data['LinkLocalIPv6Address'] !== null) {
            $object->setLinkLocalIPv6Address($data['LinkLocalIPv6Address']);
            unset($data['LinkLocalIPv6Address']);
        } elseif (\array_key_exists('LinkLocalIPv6Address', $data) && $data['LinkLocalIPv6Address'] === null) {
            $object->setLinkLocalIPv6Address(null);
        }
        if (\array_key_exists('LinkLocalIPv6PrefixLen', $data) && $data['LinkLocalIPv6PrefixLen'] !== null) {
            $object->setLinkLocalIPv6PrefixLen($data['LinkLocalIPv6PrefixLen']);
            unset($data['LinkLocalIPv6PrefixLen']);
        } elseif (\array_key_exists('LinkLocalIPv6PrefixLen', $data) && $data['LinkLocalIPv6PrefixLen'] === null) {
            $object->setLinkLocalIPv6PrefixLen(null);
        }
        if (\array_key_exists('Ports', $data) && $data['Ports'] !== null) {
            $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Ports'] as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\PortBinding', 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $object->setPorts($values);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && $data['Ports'] === null) {
            $object->setPorts(null);
        }
        if (\array_key_exists('SandboxKey', $data) && $data['SandboxKey'] !== null) {
            $object->setSandboxKey($data['SandboxKey']);
            unset($data['SandboxKey']);
        } elseif (\array_key_exists('SandboxKey', $data) && $data['SandboxKey'] === null) {
            $object->setSandboxKey(null);
        }
        if (\array_key_exists('SecondaryIPAddresses', $data) && $data['SecondaryIPAddresses'] !== null) {
            $values_2 = [];
            foreach ($data['SecondaryIPAddresses'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\Address', 'json', $context);
            }
            $object->setSecondaryIPAddresses($values_2);
            unset($data['SecondaryIPAddresses']);
        } elseif (\array_key_exists('SecondaryIPAddresses', $data) && $data['SecondaryIPAddresses'] === null) {
            $object->setSecondaryIPAddresses(null);
        }
        if (\array_key_exists('SecondaryIPv6Addresses', $data) && $data['SecondaryIPv6Addresses'] !== null) {
            $values_3 = [];
            foreach ($data['SecondaryIPv6Addresses'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\Address', 'json', $context);
            }
            $object->setSecondaryIPv6Addresses($values_3);
            unset($data['SecondaryIPv6Addresses']);
        } elseif (\array_key_exists('SecondaryIPv6Addresses', $data) && $data['SecondaryIPv6Addresses'] === null) {
            $object->setSecondaryIPv6Addresses(null);
        }
        if (\array_key_exists('EndpointID', $data) && $data['EndpointID'] !== null) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        } elseif (\array_key_exists('EndpointID', $data) && $data['EndpointID'] === null) {
            $object->setEndpointID(null);
        }
        if (\array_key_exists('Gateway', $data) && $data['Gateway'] !== null) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        } elseif (\array_key_exists('Gateway', $data) && $data['Gateway'] === null) {
            $object->setGateway(null);
        }
        if (\array_key_exists('GlobalIPv6Address', $data) && $data['GlobalIPv6Address'] !== null) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            unset($data['GlobalIPv6Address']);
        } elseif (\array_key_exists('GlobalIPv6Address', $data) && $data['GlobalIPv6Address'] === null) {
            $object->setGlobalIPv6Address(null);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data) && $data['GlobalIPv6PrefixLen'] !== null) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            unset($data['GlobalIPv6PrefixLen']);
        } elseif (\array_key_exists('GlobalIPv6PrefixLen', $data) && $data['GlobalIPv6PrefixLen'] === null) {
            $object->setGlobalIPv6PrefixLen(null);
        }
        if (\array_key_exists('IPAddress', $data) && $data['IPAddress'] !== null) {
            $object->setIPAddress($data['IPAddress']);
            unset($data['IPAddress']);
        } elseif (\array_key_exists('IPAddress', $data) && $data['IPAddress'] === null) {
            $object->setIPAddress(null);
        }
        if (\array_key_exists('IPPrefixLen', $data) && $data['IPPrefixLen'] !== null) {
            $object->setIPPrefixLen($data['IPPrefixLen']);
            unset($data['IPPrefixLen']);
        } elseif (\array_key_exists('IPPrefixLen', $data) && $data['IPPrefixLen'] === null) {
            $object->setIPPrefixLen(null);
        }
        if (\array_key_exists('IPv6Gateway', $data) && $data['IPv6Gateway'] !== null) {
            $object->setIPv6Gateway($data['IPv6Gateway']);
            unset($data['IPv6Gateway']);
        } elseif (\array_key_exists('IPv6Gateway', $data) && $data['IPv6Gateway'] === null) {
            $object->setIPv6Gateway(null);
        }
        if (\array_key_exists('MacAddress', $data) && $data['MacAddress'] !== null) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        } elseif (\array_key_exists('MacAddress', $data) && $data['MacAddress'] === null) {
            $object->setMacAddress(null);
        }
        if (\array_key_exists('Networks', $data) && $data['Networks'] !== null) {
            $values_4 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Networks'] as $key_1 => $value_4) {
                $values_4[$key_1] = $this->denormalizer->denormalize($value_4, 'Docker\\API\\Model\\EndpointSettings', 'json', $context);
            }
            $object->setNetworks($values_4);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && $data['Networks'] === null) {
            $object->setNetworks(null);
        }
        foreach ($data as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_5;
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
        if ($object->isInitialized('bridge') && $object->getBridge() !== null) {
            $data['Bridge'] = $object->getBridge();
        }
        if ($object->isInitialized('sandboxID') && $object->getSandboxID() !== null) {
            $data['SandboxID'] = $object->getSandboxID();
        }
        if ($object->isInitialized('hairpinMode') && $object->getHairpinMode() !== null) {
            $data['HairpinMode'] = $object->getHairpinMode();
        }
        if ($object->isInitialized('linkLocalIPv6Address') && $object->getLinkLocalIPv6Address() !== null) {
            $data['LinkLocalIPv6Address'] = $object->getLinkLocalIPv6Address();
        }
        if ($object->isInitialized('linkLocalIPv6PrefixLen') && $object->getLinkLocalIPv6PrefixLen() !== null) {
            $data['LinkLocalIPv6PrefixLen'] = $object->getLinkLocalIPv6PrefixLen();
        }
        if ($object->isInitialized('ports') && $object->getPorts() !== null) {
            $values = [];
            foreach ($object->getPorts() as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $data['Ports'] = $values;
        }
        if ($object->isInitialized('sandboxKey') && $object->getSandboxKey() !== null) {
            $data['SandboxKey'] = $object->getSandboxKey();
        }
        if ($object->isInitialized('secondaryIPAddresses') && $object->getSecondaryIPAddresses() !== null) {
            $values_2 = [];
            foreach ($object->getSecondaryIPAddresses() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['SecondaryIPAddresses'] = $values_2;
        }
        if ($object->isInitialized('secondaryIPv6Addresses') && $object->getSecondaryIPv6Addresses() !== null) {
            $values_3 = [];
            foreach ($object->getSecondaryIPv6Addresses() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['SecondaryIPv6Addresses'] = $values_3;
        }
        if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
            $data['EndpointID'] = $object->getEndpointID();
        }
        if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
            $data['Gateway'] = $object->getGateway();
        }
        if ($object->isInitialized('globalIPv6Address') && $object->getGlobalIPv6Address() !== null) {
            $data['GlobalIPv6Address'] = $object->getGlobalIPv6Address();
        }
        if ($object->isInitialized('globalIPv6PrefixLen') && $object->getGlobalIPv6PrefixLen() !== null) {
            $data['GlobalIPv6PrefixLen'] = $object->getGlobalIPv6PrefixLen();
        }
        if ($object->isInitialized('iPAddress') && $object->getIPAddress() !== null) {
            $data['IPAddress'] = $object->getIPAddress();
        }
        if ($object->isInitialized('iPPrefixLen') && $object->getIPPrefixLen() !== null) {
            $data['IPPrefixLen'] = $object->getIPPrefixLen();
        }
        if ($object->isInitialized('iPv6Gateway') && $object->getIPv6Gateway() !== null) {
            $data['IPv6Gateway'] = $object->getIPv6Gateway();
        }
        if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
            $data['MacAddress'] = $object->getMacAddress();
        }
        if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
            $values_4 = [];
            foreach ($object->getNetworks() as $key_1 => $value_4) {
                $values_4[$key_1] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['Networks'] = $values_4;
        }
        foreach ($object as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_5;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\NetworkSettings' => false];
    }
}
