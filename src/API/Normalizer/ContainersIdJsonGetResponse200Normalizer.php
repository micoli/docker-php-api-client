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

class ContainersIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ContainersIdJsonGetResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ContainersIdJsonGetResponse200';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainersIdJsonGetResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Path', $data) && $data['Path'] !== null) {
            $object->setPath($data['Path']);
            unset($data['Path']);
        } elseif (\array_key_exists('Path', $data) && $data['Path'] === null) {
            $object->setPath(null);
        }
        if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
            $values = [];
            foreach ($data['Args'] as $value) {
                $values[] = $value;
            }
            $object->setArgs($values);
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
            $object->setArgs(null);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($this->denormalizer->denormalize($data['State'], 'Docker\\API\\Model\\ContainerState', 'json', $context));
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Image', $data) && $data['Image'] !== null) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && $data['Image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('ResolvConfPath', $data) && $data['ResolvConfPath'] !== null) {
            $object->setResolvConfPath($data['ResolvConfPath']);
            unset($data['ResolvConfPath']);
        } elseif (\array_key_exists('ResolvConfPath', $data) && $data['ResolvConfPath'] === null) {
            $object->setResolvConfPath(null);
        }
        if (\array_key_exists('HostnamePath', $data) && $data['HostnamePath'] !== null) {
            $object->setHostnamePath($data['HostnamePath']);
            unset($data['HostnamePath']);
        } elseif (\array_key_exists('HostnamePath', $data) && $data['HostnamePath'] === null) {
            $object->setHostnamePath(null);
        }
        if (\array_key_exists('HostsPath', $data) && $data['HostsPath'] !== null) {
            $object->setHostsPath($data['HostsPath']);
            unset($data['HostsPath']);
        } elseif (\array_key_exists('HostsPath', $data) && $data['HostsPath'] === null) {
            $object->setHostsPath(null);
        }
        if (\array_key_exists('LogPath', $data) && $data['LogPath'] !== null) {
            $object->setLogPath($data['LogPath']);
            unset($data['LogPath']);
        } elseif (\array_key_exists('LogPath', $data) && $data['LogPath'] === null) {
            $object->setLogPath(null);
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('RestartCount', $data) && $data['RestartCount'] !== null) {
            $object->setRestartCount($data['RestartCount']);
            unset($data['RestartCount']);
        } elseif (\array_key_exists('RestartCount', $data) && $data['RestartCount'] === null) {
            $object->setRestartCount(null);
        }
        if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
            $object->setDriver(null);
        }
        if (\array_key_exists('Platform', $data) && $data['Platform'] !== null) {
            $object->setPlatform($data['Platform']);
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && $data['Platform'] === null) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('MountLabel', $data) && $data['MountLabel'] !== null) {
            $object->setMountLabel($data['MountLabel']);
            unset($data['MountLabel']);
        } elseif (\array_key_exists('MountLabel', $data) && $data['MountLabel'] === null) {
            $object->setMountLabel(null);
        }
        if (\array_key_exists('ProcessLabel', $data) && $data['ProcessLabel'] !== null) {
            $object->setProcessLabel($data['ProcessLabel']);
            unset($data['ProcessLabel']);
        } elseif (\array_key_exists('ProcessLabel', $data) && $data['ProcessLabel'] === null) {
            $object->setProcessLabel(null);
        }
        if (\array_key_exists('AppArmorProfile', $data) && $data['AppArmorProfile'] !== null) {
            $object->setAppArmorProfile($data['AppArmorProfile']);
            unset($data['AppArmorProfile']);
        } elseif (\array_key_exists('AppArmorProfile', $data) && $data['AppArmorProfile'] === null) {
            $object->setAppArmorProfile(null);
        }
        if (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] !== null) {
            $values_1 = [];
            foreach ($data['ExecIDs'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExecIDs($values_1);
            unset($data['ExecIDs']);
        } elseif (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] === null) {
            $object->setExecIDs(null);
        }
        if (\array_key_exists('HostConfig', $data) && $data['HostConfig'] !== null) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\\API\\Model\\HostConfig', 'json', $context));
            unset($data['HostConfig']);
        } elseif (\array_key_exists('HostConfig', $data) && $data['HostConfig'] === null) {
            $object->setHostConfig(null);
        }
        if (\array_key_exists('GraphDriver', $data) && $data['GraphDriver'] !== null) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\\API\\Model\\GraphDriverData', 'json', $context));
            unset($data['GraphDriver']);
        } elseif (\array_key_exists('GraphDriver', $data) && $data['GraphDriver'] === null) {
            $object->setGraphDriver(null);
        }
        if (\array_key_exists('SizeRw', $data) && $data['SizeRw'] !== null) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        } elseif (\array_key_exists('SizeRw', $data) && $data['SizeRw'] === null) {
            $object->setSizeRw(null);
        }
        if (\array_key_exists('SizeRootFs', $data) && $data['SizeRootFs'] !== null) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        } elseif (\array_key_exists('SizeRootFs', $data) && $data['SizeRootFs'] === null) {
            $object->setSizeRootFs(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_2 = [];
            foreach ($data['Mounts'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\MountPoint', 'json', $context);
            }
            $object->setMounts($values_2);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        if (\array_key_exists('Config', $data) && $data['Config'] !== null) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\\API\\Model\\ContainerConfig', 'json', $context));
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && $data['Config'] === null) {
            $object->setConfig(null);
        }
        if (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] !== null) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\\API\\Model\\NetworkSettings', 'json', $context));
            unset($data['NetworkSettings']);
        } elseif (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] === null) {
            $object->setNetworkSettings(null);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('created') && $object->getCreated() !== null) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('path') && $object->getPath() !== null) {
            $data['Path'] = $object->getPath();
        }
        if ($object->isInitialized('args') && $object->getArgs() !== null) {
            $values = [];
            foreach ($object->getArgs() as $value) {
                $values[] = $value;
            }
            $data['Args'] = $values;
        }
        if ($object->isInitialized('state') && $object->getState() !== null) {
            $data['State'] = $this->normalizer->normalize($object->getState(), 'json', $context);
        }
        if ($object->isInitialized('image') && $object->getImage() !== null) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('resolvConfPath') && $object->getResolvConfPath() !== null) {
            $data['ResolvConfPath'] = $object->getResolvConfPath();
        }
        if ($object->isInitialized('hostnamePath') && $object->getHostnamePath() !== null) {
            $data['HostnamePath'] = $object->getHostnamePath();
        }
        if ($object->isInitialized('hostsPath') && $object->getHostsPath() !== null) {
            $data['HostsPath'] = $object->getHostsPath();
        }
        if ($object->isInitialized('logPath') && $object->getLogPath() !== null) {
            $data['LogPath'] = $object->getLogPath();
        }
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('restartCount') && $object->getRestartCount() !== null) {
            $data['RestartCount'] = $object->getRestartCount();
        }
        if ($object->isInitialized('driver') && $object->getDriver() !== null) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
            $data['Platform'] = $object->getPlatform();
        }
        if ($object->isInitialized('mountLabel') && $object->getMountLabel() !== null) {
            $data['MountLabel'] = $object->getMountLabel();
        }
        if ($object->isInitialized('processLabel') && $object->getProcessLabel() !== null) {
            $data['ProcessLabel'] = $object->getProcessLabel();
        }
        if ($object->isInitialized('appArmorProfile') && $object->getAppArmorProfile() !== null) {
            $data['AppArmorProfile'] = $object->getAppArmorProfile();
        }
        if ($object->isInitialized('execIDs') && $object->getExecIDs() !== null) {
            $values_1 = [];
            foreach ($object->getExecIDs() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['ExecIDs'] = $values_1;
        }
        if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('graphDriver') && $object->getGraphDriver() !== null) {
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
        }
        if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
            $data['SizeRw'] = $object->getSizeRw();
        }
        if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
            $data['SizeRootFs'] = $object->getSizeRootFs();
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_2 = [];
            foreach ($object->getMounts() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Mounts'] = $values_2;
        }
        if ($object->isInitialized('config') && $object->getConfig() !== null) {
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
            $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\ContainersIdJsonGetResponse200' => false];
    }
}
