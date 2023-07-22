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

class TaskSpecContainerSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecContainerSpec';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\TaskSpecContainerSpec';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpec();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Image', $data) && $data['Image'] !== null) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && $data['Image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('Command', $data) && $data['Command'] !== null) {
            $values_1 = [];
            foreach ($data['Command'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCommand($values_1);
            unset($data['Command']);
        } elseif (\array_key_exists('Command', $data) && $data['Command'] === null) {
            $object->setCommand(null);
        }
        if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
            $values_2 = [];
            foreach ($data['Args'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setArgs($values_2);
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
            $object->setArgs(null);
        }
        if (\array_key_exists('Hostname', $data) && $data['Hostname'] !== null) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        } elseif (\array_key_exists('Hostname', $data) && $data['Hostname'] === null) {
            $object->setHostname(null);
        }
        if (\array_key_exists('Env', $data) && $data['Env'] !== null) {
            $values_3 = [];
            foreach ($data['Env'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setEnv($values_3);
            unset($data['Env']);
        } elseif (\array_key_exists('Env', $data) && $data['Env'] === null) {
            $object->setEnv(null);
        }
        if (\array_key_exists('Dir', $data) && $data['Dir'] !== null) {
            $object->setDir($data['Dir']);
            unset($data['Dir']);
        } elseif (\array_key_exists('Dir', $data) && $data['Dir'] === null) {
            $object->setDir(null);
        }
        if (\array_key_exists('User', $data) && $data['User'] !== null) {
            $object->setUser($data['User']);
            unset($data['User']);
        } elseif (\array_key_exists('User', $data) && $data['User'] === null) {
            $object->setUser(null);
        }
        if (\array_key_exists('Groups', $data) && $data['Groups'] !== null) {
            $values_4 = [];
            foreach ($data['Groups'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setGroups($values_4);
            unset($data['Groups']);
        } elseif (\array_key_exists('Groups', $data) && $data['Groups'] === null) {
            $object->setGroups(null);
        }
        if (\array_key_exists('Privileges', $data) && $data['Privileges'] !== null) {
            $object->setPrivileges($this->denormalizer->denormalize($data['Privileges'], 'Docker\\API\\Model\\TaskSpecContainerSpecPrivileges', 'json', $context));
            unset($data['Privileges']);
        } elseif (\array_key_exists('Privileges', $data) && $data['Privileges'] === null) {
            $object->setPrivileges(null);
        }
        if (\array_key_exists('TTY', $data) && $data['TTY'] !== null) {
            $object->setTTY($data['TTY']);
            unset($data['TTY']);
        } elseif (\array_key_exists('TTY', $data) && $data['TTY'] === null) {
            $object->setTTY(null);
        }
        if (\array_key_exists('OpenStdin', $data) && $data['OpenStdin'] !== null) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        } elseif (\array_key_exists('OpenStdin', $data) && $data['OpenStdin'] === null) {
            $object->setOpenStdin(null);
        }
        if (\array_key_exists('ReadOnly', $data) && $data['ReadOnly'] !== null) {
            $object->setReadOnly($data['ReadOnly']);
            unset($data['ReadOnly']);
        } elseif (\array_key_exists('ReadOnly', $data) && $data['ReadOnly'] === null) {
            $object->setReadOnly(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_5 = [];
            foreach ($data['Mounts'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Docker\\API\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_5);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        if (\array_key_exists('StopSignal', $data) && $data['StopSignal'] !== null) {
            $object->setStopSignal($data['StopSignal']);
            unset($data['StopSignal']);
        } elseif (\array_key_exists('StopSignal', $data) && $data['StopSignal'] === null) {
            $object->setStopSignal(null);
        }
        if (\array_key_exists('StopGracePeriod', $data) && $data['StopGracePeriod'] !== null) {
            $object->setStopGracePeriod($data['StopGracePeriod']);
            unset($data['StopGracePeriod']);
        } elseif (\array_key_exists('StopGracePeriod', $data) && $data['StopGracePeriod'] === null) {
            $object->setStopGracePeriod(null);
        }
        if (\array_key_exists('HealthCheck', $data) && $data['HealthCheck'] !== null) {
            $object->setHealthCheck($this->denormalizer->denormalize($data['HealthCheck'], 'Docker\\API\\Model\\HealthConfig', 'json', $context));
            unset($data['HealthCheck']);
        } elseif (\array_key_exists('HealthCheck', $data) && $data['HealthCheck'] === null) {
            $object->setHealthCheck(null);
        }
        if (\array_key_exists('Hosts', $data) && $data['Hosts'] !== null) {
            $values_6 = [];
            foreach ($data['Hosts'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setHosts($values_6);
            unset($data['Hosts']);
        } elseif (\array_key_exists('Hosts', $data) && $data['Hosts'] === null) {
            $object->setHosts(null);
        }
        if (\array_key_exists('DNSConfig', $data) && $data['DNSConfig'] !== null) {
            $object->setDNSConfig($this->denormalizer->denormalize($data['DNSConfig'], 'Docker\\API\\Model\\TaskSpecContainerSpecDNSConfig', 'json', $context));
            unset($data['DNSConfig']);
        } elseif (\array_key_exists('DNSConfig', $data) && $data['DNSConfig'] === null) {
            $object->setDNSConfig(null);
        }
        if (\array_key_exists('Secrets', $data) && $data['Secrets'] !== null) {
            $values_7 = [];
            foreach ($data['Secrets'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItem', 'json', $context);
            }
            $object->setSecrets($values_7);
            unset($data['Secrets']);
        } elseif (\array_key_exists('Secrets', $data) && $data['Secrets'] === null) {
            $object->setSecrets(null);
        }
        if (\array_key_exists('Configs', $data) && $data['Configs'] !== null) {
            $values_8 = [];
            foreach ($data['Configs'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Docker\\API\\Model\\TaskSpecContainerSpecConfigsItem', 'json', $context);
            }
            $object->setConfigs($values_8);
            unset($data['Configs']);
        } elseif (\array_key_exists('Configs', $data) && $data['Configs'] === null) {
            $object->setConfigs(null);
        }
        if (\array_key_exists('Isolation', $data) && $data['Isolation'] !== null) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && $data['Isolation'] === null) {
            $object->setIsolation(null);
        }
        if (\array_key_exists('Init', $data) && $data['Init'] !== null) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        } elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('Sysctls', $data) && $data['Sysctls'] !== null) {
            $values_9 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $object->setSysctls($values_9);
            unset($data['Sysctls']);
        } elseif (\array_key_exists('Sysctls', $data) && $data['Sysctls'] === null) {
            $object->setSysctls(null);
        }
        if (\array_key_exists('CapabilityAdd', $data) && $data['CapabilityAdd'] !== null) {
            $values_10 = [];
            foreach ($data['CapabilityAdd'] as $value_10) {
                $values_10[] = $value_10;
            }
            $object->setCapabilityAdd($values_10);
            unset($data['CapabilityAdd']);
        } elseif (\array_key_exists('CapabilityAdd', $data) && $data['CapabilityAdd'] === null) {
            $object->setCapabilityAdd(null);
        }
        if (\array_key_exists('CapabilityDrop', $data) && $data['CapabilityDrop'] !== null) {
            $values_11 = [];
            foreach ($data['CapabilityDrop'] as $value_11) {
                $values_11[] = $value_11;
            }
            $object->setCapabilityDrop($values_11);
            unset($data['CapabilityDrop']);
        } elseif (\array_key_exists('CapabilityDrop', $data) && $data['CapabilityDrop'] === null) {
            $object->setCapabilityDrop(null);
        }
        if (\array_key_exists('Ulimits', $data) && $data['Ulimits'] !== null) {
            $values_12 = [];
            foreach ($data['Ulimits'] as $value_12) {
                $values_12[] = $this->denormalizer->denormalize($value_12, 'Docker\\API\\Model\\TaskSpecContainerSpecUlimitsItem', 'json', $context);
            }
            $object->setUlimits($values_12);
            unset($data['Ulimits']);
        } elseif (\array_key_exists('Ulimits', $data) && $data['Ulimits'] === null) {
            $object->setUlimits(null);
        }
        foreach ($data as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_13;
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
        if ($object->isInitialized('image') && $object->getImage() !== null) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values = [];
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('command') && $object->getCommand() !== null) {
            $values_1 = [];
            foreach ($object->getCommand() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Command'] = $values_1;
        }
        if ($object->isInitialized('args') && $object->getArgs() !== null) {
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
        }
        if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
            $data['Hostname'] = $object->getHostname();
        }
        if ($object->isInitialized('env') && $object->getEnv() !== null) {
            $values_3 = [];
            foreach ($object->getEnv() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Env'] = $values_3;
        }
        if ($object->isInitialized('dir') && $object->getDir() !== null) {
            $data['Dir'] = $object->getDir();
        }
        if ($object->isInitialized('user') && $object->getUser() !== null) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('groups') && $object->getGroups() !== null) {
            $values_4 = [];
            foreach ($object->getGroups() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Groups'] = $values_4;
        }
        if ($object->isInitialized('privileges') && $object->getPrivileges() !== null) {
            $data['Privileges'] = $this->normalizer->normalize($object->getPrivileges(), 'json', $context);
        }
        if ($object->isInitialized('tTY') && $object->getTTY() !== null) {
            $data['TTY'] = $object->getTTY();
        }
        if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('readOnly') && $object->getReadOnly() !== null) {
            $data['ReadOnly'] = $object->getReadOnly();
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_5 = [];
            foreach ($object->getMounts() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Mounts'] = $values_5;
        }
        if ($object->isInitialized('stopSignal') && $object->getStopSignal() !== null) {
            $data['StopSignal'] = $object->getStopSignal();
        }
        if ($object->isInitialized('stopGracePeriod') && $object->getStopGracePeriod() !== null) {
            $data['StopGracePeriod'] = $object->getStopGracePeriod();
        }
        if ($object->isInitialized('healthCheck') && $object->getHealthCheck() !== null) {
            $data['HealthCheck'] = $this->normalizer->normalize($object->getHealthCheck(), 'json', $context);
        }
        if ($object->isInitialized('hosts') && $object->getHosts() !== null) {
            $values_6 = [];
            foreach ($object->getHosts() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['Hosts'] = $values_6;
        }
        if ($object->isInitialized('dNSConfig') && $object->getDNSConfig() !== null) {
            $data['DNSConfig'] = $this->normalizer->normalize($object->getDNSConfig(), 'json', $context);
        }
        if ($object->isInitialized('secrets') && $object->getSecrets() !== null) {
            $values_7 = [];
            foreach ($object->getSecrets() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['Secrets'] = $values_7;
        }
        if ($object->isInitialized('configs') && $object->getConfigs() !== null) {
            $values_8 = [];
            foreach ($object->getConfigs() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Configs'] = $values_8;
        }
        if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('init') && $object->getInit() !== null) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('sysctls') && $object->getSysctls() !== null) {
            $values_9 = [];
            foreach ($object->getSysctls() as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $data['Sysctls'] = $values_9;
        }
        if ($object->isInitialized('capabilityAdd') && $object->getCapabilityAdd() !== null) {
            $values_10 = [];
            foreach ($object->getCapabilityAdd() as $value_10) {
                $values_10[] = $value_10;
            }
            $data['CapabilityAdd'] = $values_10;
        }
        if ($object->isInitialized('capabilityDrop') && $object->getCapabilityDrop() !== null) {
            $values_11 = [];
            foreach ($object->getCapabilityDrop() as $value_11) {
                $values_11[] = $value_11;
            }
            $data['CapabilityDrop'] = $values_11;
        }
        if ($object->isInitialized('ulimits') && $object->getUlimits() !== null) {
            $values_12 = [];
            foreach ($object->getUlimits() as $value_12) {
                $values_12[] = $this->normalizer->normalize($value_12, 'json', $context);
            }
            $data['Ulimits'] = $values_12;
        }
        foreach ($object as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_13;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\TaskSpecContainerSpec' => false];
    }
}
