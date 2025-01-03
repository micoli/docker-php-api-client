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

class HostConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\HostConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\HostConfig';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\HostConfig();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('CpuShares', $data) && $data['CpuShares'] !== null) {
            $object->setCpuShares($data['CpuShares']);
            unset($data['CpuShares']);
        } elseif (\array_key_exists('CpuShares', $data) && $data['CpuShares'] === null) {
            $object->setCpuShares(null);
        }
        if (\array_key_exists('Memory', $data) && $data['Memory'] !== null) {
            $object->setMemory($data['Memory']);
            unset($data['Memory']);
        } elseif (\array_key_exists('Memory', $data) && $data['Memory'] === null) {
            $object->setMemory(null);
        }
        if (\array_key_exists('CgroupParent', $data) && $data['CgroupParent'] !== null) {
            $object->setCgroupParent($data['CgroupParent']);
            unset($data['CgroupParent']);
        } elseif (\array_key_exists('CgroupParent', $data) && $data['CgroupParent'] === null) {
            $object->setCgroupParent(null);
        }
        if (\array_key_exists('BlkioWeight', $data) && $data['BlkioWeight'] !== null) {
            $object->setBlkioWeight($data['BlkioWeight']);
            unset($data['BlkioWeight']);
        } elseif (\array_key_exists('BlkioWeight', $data) && $data['BlkioWeight'] === null) {
            $object->setBlkioWeight(null);
        }
        if (\array_key_exists('BlkioWeightDevice', $data) && $data['BlkioWeightDevice'] !== null) {
            $values = [];
            foreach ($data['BlkioWeightDevice'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\ResourcesBlkioWeightDeviceItem', 'json', $context);
            }
            $object->setBlkioWeightDevice($values);
            unset($data['BlkioWeightDevice']);
        } elseif (\array_key_exists('BlkioWeightDevice', $data) && $data['BlkioWeightDevice'] === null) {
            $object->setBlkioWeightDevice(null);
        }
        if (\array_key_exists('BlkioDeviceReadBps', $data) && $data['BlkioDeviceReadBps'] !== null) {
            $values_1 = [];
            foreach ($data['BlkioDeviceReadBps'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadBps($values_1);
            unset($data['BlkioDeviceReadBps']);
        } elseif (\array_key_exists('BlkioDeviceReadBps', $data) && $data['BlkioDeviceReadBps'] === null) {
            $object->setBlkioDeviceReadBps(null);
        }
        if (\array_key_exists('BlkioDeviceWriteBps', $data) && $data['BlkioDeviceWriteBps'] !== null) {
            $values_2 = [];
            foreach ($data['BlkioDeviceWriteBps'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceWriteBps($values_2);
            unset($data['BlkioDeviceWriteBps']);
        } elseif (\array_key_exists('BlkioDeviceWriteBps', $data) && $data['BlkioDeviceWriteBps'] === null) {
            $object->setBlkioDeviceWriteBps(null);
        }
        if (\array_key_exists('BlkioDeviceReadIOps', $data) && $data['BlkioDeviceReadIOps'] !== null) {
            $values_3 = [];
            foreach ($data['BlkioDeviceReadIOps'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadIOps($values_3);
            unset($data['BlkioDeviceReadIOps']);
        } elseif (\array_key_exists('BlkioDeviceReadIOps', $data) && $data['BlkioDeviceReadIOps'] === null) {
            $object->setBlkioDeviceReadIOps(null);
        }
        if (\array_key_exists('BlkioDeviceWriteIOps', $data) && $data['BlkioDeviceWriteIOps'] !== null) {
            $values_4 = [];
            foreach ($data['BlkioDeviceWriteIOps'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\\API\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceWriteIOps($values_4);
            unset($data['BlkioDeviceWriteIOps']);
        } elseif (\array_key_exists('BlkioDeviceWriteIOps', $data) && $data['BlkioDeviceWriteIOps'] === null) {
            $object->setBlkioDeviceWriteIOps(null);
        }
        if (\array_key_exists('CpuPeriod', $data) && $data['CpuPeriod'] !== null) {
            $object->setCpuPeriod($data['CpuPeriod']);
            unset($data['CpuPeriod']);
        } elseif (\array_key_exists('CpuPeriod', $data) && $data['CpuPeriod'] === null) {
            $object->setCpuPeriod(null);
        }
        if (\array_key_exists('CpuQuota', $data) && $data['CpuQuota'] !== null) {
            $object->setCpuQuota($data['CpuQuota']);
            unset($data['CpuQuota']);
        } elseif (\array_key_exists('CpuQuota', $data) && $data['CpuQuota'] === null) {
            $object->setCpuQuota(null);
        }
        if (\array_key_exists('CpuRealtimePeriod', $data) && $data['CpuRealtimePeriod'] !== null) {
            $object->setCpuRealtimePeriod($data['CpuRealtimePeriod']);
            unset($data['CpuRealtimePeriod']);
        } elseif (\array_key_exists('CpuRealtimePeriod', $data) && $data['CpuRealtimePeriod'] === null) {
            $object->setCpuRealtimePeriod(null);
        }
        if (\array_key_exists('CpuRealtimeRuntime', $data) && $data['CpuRealtimeRuntime'] !== null) {
            $object->setCpuRealtimeRuntime($data['CpuRealtimeRuntime']);
            unset($data['CpuRealtimeRuntime']);
        } elseif (\array_key_exists('CpuRealtimeRuntime', $data) && $data['CpuRealtimeRuntime'] === null) {
            $object->setCpuRealtimeRuntime(null);
        }
        if (\array_key_exists('CpusetCpus', $data) && $data['CpusetCpus'] !== null) {
            $object->setCpusetCpus($data['CpusetCpus']);
            unset($data['CpusetCpus']);
        } elseif (\array_key_exists('CpusetCpus', $data) && $data['CpusetCpus'] === null) {
            $object->setCpusetCpus(null);
        }
        if (\array_key_exists('CpusetMems', $data) && $data['CpusetMems'] !== null) {
            $object->setCpusetMems($data['CpusetMems']);
            unset($data['CpusetMems']);
        } elseif (\array_key_exists('CpusetMems', $data) && $data['CpusetMems'] === null) {
            $object->setCpusetMems(null);
        }
        if (\array_key_exists('Devices', $data) && $data['Devices'] !== null) {
            $values_5 = [];
            foreach ($data['Devices'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Docker\\API\\Model\\DeviceMapping', 'json', $context);
            }
            $object->setDevices($values_5);
            unset($data['Devices']);
        } elseif (\array_key_exists('Devices', $data) && $data['Devices'] === null) {
            $object->setDevices(null);
        }
        if (\array_key_exists('DeviceCgroupRules', $data) && $data['DeviceCgroupRules'] !== null) {
            $values_6 = [];
            foreach ($data['DeviceCgroupRules'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setDeviceCgroupRules($values_6);
            unset($data['DeviceCgroupRules']);
        } elseif (\array_key_exists('DeviceCgroupRules', $data) && $data['DeviceCgroupRules'] === null) {
            $object->setDeviceCgroupRules(null);
        }
        if (\array_key_exists('DeviceRequests', $data) && $data['DeviceRequests'] !== null) {
            $values_7 = [];
            foreach ($data['DeviceRequests'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Docker\\API\\Model\\DeviceRequest', 'json', $context);
            }
            $object->setDeviceRequests($values_7);
            unset($data['DeviceRequests']);
        } elseif (\array_key_exists('DeviceRequests', $data) && $data['DeviceRequests'] === null) {
            $object->setDeviceRequests(null);
        }
        if (\array_key_exists('KernelMemory', $data) && $data['KernelMemory'] !== null) {
            $object->setKernelMemory($data['KernelMemory']);
            unset($data['KernelMemory']);
        } elseif (\array_key_exists('KernelMemory', $data) && $data['KernelMemory'] === null) {
            $object->setKernelMemory(null);
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && $data['KernelMemoryTCP'] !== null) {
            $object->setKernelMemoryTCP($data['KernelMemoryTCP']);
            unset($data['KernelMemoryTCP']);
        } elseif (\array_key_exists('KernelMemoryTCP', $data) && $data['KernelMemoryTCP'] === null) {
            $object->setKernelMemoryTCP(null);
        }
        if (\array_key_exists('MemoryReservation', $data) && $data['MemoryReservation'] !== null) {
            $object->setMemoryReservation($data['MemoryReservation']);
            unset($data['MemoryReservation']);
        } elseif (\array_key_exists('MemoryReservation', $data) && $data['MemoryReservation'] === null) {
            $object->setMemoryReservation(null);
        }
        if (\array_key_exists('MemorySwap', $data) && $data['MemorySwap'] !== null) {
            $object->setMemorySwap($data['MemorySwap']);
            unset($data['MemorySwap']);
        } elseif (\array_key_exists('MemorySwap', $data) && $data['MemorySwap'] === null) {
            $object->setMemorySwap(null);
        }
        if (\array_key_exists('MemorySwappiness', $data) && $data['MemorySwappiness'] !== null) {
            $object->setMemorySwappiness($data['MemorySwappiness']);
            unset($data['MemorySwappiness']);
        } elseif (\array_key_exists('MemorySwappiness', $data) && $data['MemorySwappiness'] === null) {
            $object->setMemorySwappiness(null);
        }
        if (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] !== null) {
            $object->setNanoCPUs($data['NanoCPUs']);
            unset($data['NanoCPUs']);
        } elseif (\array_key_exists('NanoCPUs', $data) && $data['NanoCPUs'] === null) {
            $object->setNanoCPUs(null);
        }
        if (\array_key_exists('OomKillDisable', $data) && $data['OomKillDisable'] !== null) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        } elseif (\array_key_exists('OomKillDisable', $data) && $data['OomKillDisable'] === null) {
            $object->setOomKillDisable(null);
        }
        if (\array_key_exists('Init', $data) && $data['Init'] !== null) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        } elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] !== null) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        } elseif (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] === null) {
            $object->setPidsLimit(null);
        }
        if (\array_key_exists('Ulimits', $data) && $data['Ulimits'] !== null) {
            $values_8 = [];
            foreach ($data['Ulimits'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Docker\\API\\Model\\ResourcesUlimitsItem', 'json', $context);
            }
            $object->setUlimits($values_8);
            unset($data['Ulimits']);
        } elseif (\array_key_exists('Ulimits', $data) && $data['Ulimits'] === null) {
            $object->setUlimits(null);
        }
        if (\array_key_exists('CpuCount', $data) && $data['CpuCount'] !== null) {
            $object->setCpuCount($data['CpuCount']);
            unset($data['CpuCount']);
        } elseif (\array_key_exists('CpuCount', $data) && $data['CpuCount'] === null) {
            $object->setCpuCount(null);
        }
        if (\array_key_exists('CpuPercent', $data) && $data['CpuPercent'] !== null) {
            $object->setCpuPercent($data['CpuPercent']);
            unset($data['CpuPercent']);
        } elseif (\array_key_exists('CpuPercent', $data) && $data['CpuPercent'] === null) {
            $object->setCpuPercent(null);
        }
        if (\array_key_exists('IOMaximumIOps', $data) && $data['IOMaximumIOps'] !== null) {
            $object->setIOMaximumIOps($data['IOMaximumIOps']);
            unset($data['IOMaximumIOps']);
        } elseif (\array_key_exists('IOMaximumIOps', $data) && $data['IOMaximumIOps'] === null) {
            $object->setIOMaximumIOps(null);
        }
        if (\array_key_exists('IOMaximumBandwidth', $data) && $data['IOMaximumBandwidth'] !== null) {
            $object->setIOMaximumBandwidth($data['IOMaximumBandwidth']);
            unset($data['IOMaximumBandwidth']);
        } elseif (\array_key_exists('IOMaximumBandwidth', $data) && $data['IOMaximumBandwidth'] === null) {
            $object->setIOMaximumBandwidth(null);
        }
        if (\array_key_exists('Binds', $data) && $data['Binds'] !== null) {
            $values_9 = [];
            foreach ($data['Binds'] as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setBinds($values_9);
            unset($data['Binds']);
        } elseif (\array_key_exists('Binds', $data) && $data['Binds'] === null) {
            $object->setBinds(null);
        }
        if (\array_key_exists('ContainerIDFile', $data) && $data['ContainerIDFile'] !== null) {
            $object->setContainerIDFile($data['ContainerIDFile']);
            unset($data['ContainerIDFile']);
        } elseif (\array_key_exists('ContainerIDFile', $data) && $data['ContainerIDFile'] === null) {
            $object->setContainerIDFile(null);
        }
        if (\array_key_exists('LogConfig', $data) && $data['LogConfig'] !== null) {
            $object->setLogConfig($this->denormalizer->denormalize($data['LogConfig'], 'Docker\\API\\Model\\HostConfigLogConfig', 'json', $context));
            unset($data['LogConfig']);
        } elseif (\array_key_exists('LogConfig', $data) && $data['LogConfig'] === null) {
            $object->setLogConfig(null);
        }
        if (\array_key_exists('NetworkMode', $data) && $data['NetworkMode'] !== null) {
            $object->setNetworkMode($data['NetworkMode']);
            unset($data['NetworkMode']);
        } elseif (\array_key_exists('NetworkMode', $data) && $data['NetworkMode'] === null) {
            $object->setNetworkMode(null);
        }
        if (\array_key_exists('PortBindings', $data) && $data['PortBindings'] !== null) {
            $values_10 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['PortBindings'] as $key => $value_10) {
                $values_11 = [];
                foreach ($value_10 as $value_11) {
                    $values_11[] = $this->denormalizer->denormalize($value_11, 'Docker\\API\\Model\\PortBinding', 'json', $context);
                }
                $values_10[$key] = $values_11;
            }
            $object->setPortBindings($values_10);
            unset($data['PortBindings']);
        } elseif (\array_key_exists('PortBindings', $data) && $data['PortBindings'] === null) {
            $object->setPortBindings(null);
        }
        if (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] !== null) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\\API\\Model\\RestartPolicy', 'json', $context));
            unset($data['RestartPolicy']);
        } elseif (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] === null) {
            $object->setRestartPolicy(null);
        }
        if (\array_key_exists('AutoRemove', $data) && $data['AutoRemove'] !== null) {
            $object->setAutoRemove($data['AutoRemove']);
            unset($data['AutoRemove']);
        } elseif (\array_key_exists('AutoRemove', $data) && $data['AutoRemove'] === null) {
            $object->setAutoRemove(null);
        }
        if (\array_key_exists('VolumeDriver', $data) && $data['VolumeDriver'] !== null) {
            $object->setVolumeDriver($data['VolumeDriver']);
            unset($data['VolumeDriver']);
        } elseif (\array_key_exists('VolumeDriver', $data) && $data['VolumeDriver'] === null) {
            $object->setVolumeDriver(null);
        }
        if (\array_key_exists('VolumesFrom', $data) && $data['VolumesFrom'] !== null) {
            $values_12 = [];
            foreach ($data['VolumesFrom'] as $value_12) {
                $values_12[] = $value_12;
            }
            $object->setVolumesFrom($values_12);
            unset($data['VolumesFrom']);
        } elseif (\array_key_exists('VolumesFrom', $data) && $data['VolumesFrom'] === null) {
            $object->setVolumesFrom(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_13 = [];
            foreach ($data['Mounts'] as $value_13) {
                $values_13[] = $this->denormalizer->denormalize($value_13, 'Docker\\API\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_13);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        if (\array_key_exists('CapAdd', $data) && $data['CapAdd'] !== null) {
            $values_14 = [];
            foreach ($data['CapAdd'] as $value_14) {
                $values_14[] = $value_14;
            }
            $object->setCapAdd($values_14);
            unset($data['CapAdd']);
        } elseif (\array_key_exists('CapAdd', $data) && $data['CapAdd'] === null) {
            $object->setCapAdd(null);
        }
        if (\array_key_exists('CapDrop', $data) && $data['CapDrop'] !== null) {
            $values_15 = [];
            foreach ($data['CapDrop'] as $value_15) {
                $values_15[] = $value_15;
            }
            $object->setCapDrop($values_15);
            unset($data['CapDrop']);
        } elseif (\array_key_exists('CapDrop', $data) && $data['CapDrop'] === null) {
            $object->setCapDrop(null);
        }
        if (\array_key_exists('CgroupnsMode', $data) && $data['CgroupnsMode'] !== null) {
            $object->setCgroupnsMode($data['CgroupnsMode']);
            unset($data['CgroupnsMode']);
        } elseif (\array_key_exists('CgroupnsMode', $data) && $data['CgroupnsMode'] === null) {
            $object->setCgroupnsMode(null);
        }
        if (\array_key_exists('Dns', $data) && $data['Dns'] !== null) {
            $values_16 = [];
            foreach ($data['Dns'] as $value_16) {
                $values_16[] = $value_16;
            }
            $object->setDns($values_16);
            unset($data['Dns']);
        } elseif (\array_key_exists('Dns', $data) && $data['Dns'] === null) {
            $object->setDns(null);
        }
        if (\array_key_exists('DnsOptions', $data) && $data['DnsOptions'] !== null) {
            $values_17 = [];
            foreach ($data['DnsOptions'] as $value_17) {
                $values_17[] = $value_17;
            }
            $object->setDnsOptions($values_17);
            unset($data['DnsOptions']);
        } elseif (\array_key_exists('DnsOptions', $data) && $data['DnsOptions'] === null) {
            $object->setDnsOptions(null);
        }
        if (\array_key_exists('DnsSearch', $data) && $data['DnsSearch'] !== null) {
            $values_18 = [];
            foreach ($data['DnsSearch'] as $value_18) {
                $values_18[] = $value_18;
            }
            $object->setDnsSearch($values_18);
            unset($data['DnsSearch']);
        } elseif (\array_key_exists('DnsSearch', $data) && $data['DnsSearch'] === null) {
            $object->setDnsSearch(null);
        }
        if (\array_key_exists('ExtraHosts', $data) && $data['ExtraHosts'] !== null) {
            $values_19 = [];
            foreach ($data['ExtraHosts'] as $value_19) {
                $values_19[] = $value_19;
            }
            $object->setExtraHosts($values_19);
            unset($data['ExtraHosts']);
        } elseif (\array_key_exists('ExtraHosts', $data) && $data['ExtraHosts'] === null) {
            $object->setExtraHosts(null);
        }
        if (\array_key_exists('GroupAdd', $data) && $data['GroupAdd'] !== null) {
            $values_20 = [];
            foreach ($data['GroupAdd'] as $value_20) {
                $values_20[] = $value_20;
            }
            $object->setGroupAdd($values_20);
            unset($data['GroupAdd']);
        } elseif (\array_key_exists('GroupAdd', $data) && $data['GroupAdd'] === null) {
            $object->setGroupAdd(null);
        }
        if (\array_key_exists('IpcMode', $data) && $data['IpcMode'] !== null) {
            $object->setIpcMode($data['IpcMode']);
            unset($data['IpcMode']);
        } elseif (\array_key_exists('IpcMode', $data) && $data['IpcMode'] === null) {
            $object->setIpcMode(null);
        }
        if (\array_key_exists('Cgroup', $data) && $data['Cgroup'] !== null) {
            $object->setCgroup($data['Cgroup']);
            unset($data['Cgroup']);
        } elseif (\array_key_exists('Cgroup', $data) && $data['Cgroup'] === null) {
            $object->setCgroup(null);
        }
        if (\array_key_exists('Links', $data) && $data['Links'] !== null) {
            $values_21 = [];
            foreach ($data['Links'] as $value_21) {
                $values_21[] = $value_21;
            }
            $object->setLinks($values_21);
            unset($data['Links']);
        } elseif (\array_key_exists('Links', $data) && $data['Links'] === null) {
            $object->setLinks(null);
        }
        if (\array_key_exists('OomScoreAdj', $data) && $data['OomScoreAdj'] !== null) {
            $object->setOomScoreAdj($data['OomScoreAdj']);
            unset($data['OomScoreAdj']);
        } elseif (\array_key_exists('OomScoreAdj', $data) && $data['OomScoreAdj'] === null) {
            $object->setOomScoreAdj(null);
        }
        if (\array_key_exists('PidMode', $data) && $data['PidMode'] !== null) {
            $object->setPidMode($data['PidMode']);
            unset($data['PidMode']);
        } elseif (\array_key_exists('PidMode', $data) && $data['PidMode'] === null) {
            $object->setPidMode(null);
        }
        if (\array_key_exists('Privileged', $data) && $data['Privileged'] !== null) {
            $object->setPrivileged($data['Privileged']);
            unset($data['Privileged']);
        } elseif (\array_key_exists('Privileged', $data) && $data['Privileged'] === null) {
            $object->setPrivileged(null);
        }
        if (\array_key_exists('PublishAllPorts', $data) && $data['PublishAllPorts'] !== null) {
            $object->setPublishAllPorts($data['PublishAllPorts']);
            unset($data['PublishAllPorts']);
        } elseif (\array_key_exists('PublishAllPorts', $data) && $data['PublishAllPorts'] === null) {
            $object->setPublishAllPorts(null);
        }
        if (\array_key_exists('ReadonlyRootfs', $data) && $data['ReadonlyRootfs'] !== null) {
            $object->setReadonlyRootfs($data['ReadonlyRootfs']);
            unset($data['ReadonlyRootfs']);
        } elseif (\array_key_exists('ReadonlyRootfs', $data) && $data['ReadonlyRootfs'] === null) {
            $object->setReadonlyRootfs(null);
        }
        if (\array_key_exists('SecurityOpt', $data) && $data['SecurityOpt'] !== null) {
            $values_22 = [];
            foreach ($data['SecurityOpt'] as $value_22) {
                $values_22[] = $value_22;
            }
            $object->setSecurityOpt($values_22);
            unset($data['SecurityOpt']);
        } elseif (\array_key_exists('SecurityOpt', $data) && $data['SecurityOpt'] === null) {
            $object->setSecurityOpt(null);
        }
        if (\array_key_exists('StorageOpt', $data) && $data['StorageOpt'] !== null) {
            $values_23 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['StorageOpt'] as $key_1 => $value_23) {
                $values_23[$key_1] = $value_23;
            }
            $object->setStorageOpt($values_23);
            unset($data['StorageOpt']);
        } elseif (\array_key_exists('StorageOpt', $data) && $data['StorageOpt'] === null) {
            $object->setStorageOpt(null);
        }
        if (\array_key_exists('Tmpfs', $data) && $data['Tmpfs'] !== null) {
            $values_24 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Tmpfs'] as $key_2 => $value_24) {
                $values_24[$key_2] = $value_24;
            }
            $object->setTmpfs($values_24);
            unset($data['Tmpfs']);
        } elseif (\array_key_exists('Tmpfs', $data) && $data['Tmpfs'] === null) {
            $object->setTmpfs(null);
        }
        if (\array_key_exists('UTSMode', $data) && $data['UTSMode'] !== null) {
            $object->setUTSMode($data['UTSMode']);
            unset($data['UTSMode']);
        } elseif (\array_key_exists('UTSMode', $data) && $data['UTSMode'] === null) {
            $object->setUTSMode(null);
        }
        if (\array_key_exists('UsernsMode', $data) && $data['UsernsMode'] !== null) {
            $object->setUsernsMode($data['UsernsMode']);
            unset($data['UsernsMode']);
        } elseif (\array_key_exists('UsernsMode', $data) && $data['UsernsMode'] === null) {
            $object->setUsernsMode(null);
        }
        if (\array_key_exists('ShmSize', $data) && $data['ShmSize'] !== null) {
            $object->setShmSize($data['ShmSize']);
            unset($data['ShmSize']);
        } elseif (\array_key_exists('ShmSize', $data) && $data['ShmSize'] === null) {
            $object->setShmSize(null);
        }
        if (\array_key_exists('Sysctls', $data) && $data['Sysctls'] !== null) {
            $values_25 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_3 => $value_25) {
                $values_25[$key_3] = $value_25;
            }
            $object->setSysctls($values_25);
            unset($data['Sysctls']);
        } elseif (\array_key_exists('Sysctls', $data) && $data['Sysctls'] === null) {
            $object->setSysctls(null);
        }
        if (\array_key_exists('Runtime', $data) && $data['Runtime'] !== null) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        } elseif (\array_key_exists('Runtime', $data) && $data['Runtime'] === null) {
            $object->setRuntime(null);
        }
        if (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] !== null) {
            $values_26 = [];
            foreach ($data['ConsoleSize'] as $value_26) {
                $values_26[] = $value_26;
            }
            $object->setConsoleSize($values_26);
            unset($data['ConsoleSize']);
        } elseif (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] === null) {
            $object->setConsoleSize(null);
        }
        if (\array_key_exists('Isolation', $data) && $data['Isolation'] !== null) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && $data['Isolation'] === null) {
            $object->setIsolation(null);
        }
        if (\array_key_exists('MaskedPaths', $data) && $data['MaskedPaths'] !== null) {
            $values_27 = [];
            foreach ($data['MaskedPaths'] as $value_27) {
                $values_27[] = $value_27;
            }
            $object->setMaskedPaths($values_27);
            unset($data['MaskedPaths']);
        } elseif (\array_key_exists('MaskedPaths', $data) && $data['MaskedPaths'] === null) {
            $object->setMaskedPaths(null);
        }
        if (\array_key_exists('ReadonlyPaths', $data) && $data['ReadonlyPaths'] !== null) {
            $values_28 = [];
            foreach ($data['ReadonlyPaths'] as $value_28) {
                $values_28[] = $value_28;
            }
            $object->setReadonlyPaths($values_28);
            unset($data['ReadonlyPaths']);
        } elseif (\array_key_exists('ReadonlyPaths', $data) && $data['ReadonlyPaths'] === null) {
            $object->setReadonlyPaths(null);
        }
        foreach ($data as $key_4 => $value_29) {
            if (preg_match('/.*/', (string) $key_4)) {
                $object[$key_4] = $value_29;
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
        if ($object->isInitialized('cpuShares') && $object->getCpuShares() !== null) {
            $data['CpuShares'] = $object->getCpuShares();
        }
        if ($object->isInitialized('memory') && $object->getMemory() !== null) {
            $data['Memory'] = $object->getMemory();
        }
        if ($object->isInitialized('cgroupParent') && $object->getCgroupParent() !== null) {
            $data['CgroupParent'] = $object->getCgroupParent();
        }
        if ($object->isInitialized('blkioWeight') && $object->getBlkioWeight() !== null) {
            $data['BlkioWeight'] = $object->getBlkioWeight();
        }
        if ($object->isInitialized('blkioWeightDevice') && $object->getBlkioWeightDevice() !== null) {
            $values = [];
            foreach ($object->getBlkioWeightDevice() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['BlkioWeightDevice'] = $values;
        }
        if ($object->isInitialized('blkioDeviceReadBps') && $object->getBlkioDeviceReadBps() !== null) {
            $values_1 = [];
            foreach ($object->getBlkioDeviceReadBps() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['BlkioDeviceReadBps'] = $values_1;
        }
        if ($object->isInitialized('blkioDeviceWriteBps') && $object->getBlkioDeviceWriteBps() !== null) {
            $values_2 = [];
            foreach ($object->getBlkioDeviceWriteBps() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['BlkioDeviceWriteBps'] = $values_2;
        }
        if ($object->isInitialized('blkioDeviceReadIOps') && $object->getBlkioDeviceReadIOps() !== null) {
            $values_3 = [];
            foreach ($object->getBlkioDeviceReadIOps() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['BlkioDeviceReadIOps'] = $values_3;
        }
        if ($object->isInitialized('blkioDeviceWriteIOps') && $object->getBlkioDeviceWriteIOps() !== null) {
            $values_4 = [];
            foreach ($object->getBlkioDeviceWriteIOps() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['BlkioDeviceWriteIOps'] = $values_4;
        }
        if ($object->isInitialized('cpuPeriod') && $object->getCpuPeriod() !== null) {
            $data['CpuPeriod'] = $object->getCpuPeriod();
        }
        if ($object->isInitialized('cpuQuota') && $object->getCpuQuota() !== null) {
            $data['CpuQuota'] = $object->getCpuQuota();
        }
        if ($object->isInitialized('cpuRealtimePeriod') && $object->getCpuRealtimePeriod() !== null) {
            $data['CpuRealtimePeriod'] = $object->getCpuRealtimePeriod();
        }
        if ($object->isInitialized('cpuRealtimeRuntime') && $object->getCpuRealtimeRuntime() !== null) {
            $data['CpuRealtimeRuntime'] = $object->getCpuRealtimeRuntime();
        }
        if ($object->isInitialized('cpusetCpus') && $object->getCpusetCpus() !== null) {
            $data['CpusetCpus'] = $object->getCpusetCpus();
        }
        if ($object->isInitialized('cpusetMems') && $object->getCpusetMems() !== null) {
            $data['CpusetMems'] = $object->getCpusetMems();
        }
        if ($object->isInitialized('devices') && $object->getDevices() !== null) {
            $values_5 = [];
            foreach ($object->getDevices() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Devices'] = $values_5;
        }
        if ($object->isInitialized('deviceCgroupRules') && $object->getDeviceCgroupRules() !== null) {
            $values_6 = [];
            foreach ($object->getDeviceCgroupRules() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['DeviceCgroupRules'] = $values_6;
        }
        if ($object->isInitialized('deviceRequests') && $object->getDeviceRequests() !== null) {
            $values_7 = [];
            foreach ($object->getDeviceRequests() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['DeviceRequests'] = $values_7;
        }
        if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
            $data['KernelMemory'] = $object->getKernelMemory();
        }
        if ($object->isInitialized('kernelMemoryTCP') && $object->getKernelMemoryTCP() !== null) {
            $data['KernelMemoryTCP'] = $object->getKernelMemoryTCP();
        }
        if ($object->isInitialized('memoryReservation') && $object->getMemoryReservation() !== null) {
            $data['MemoryReservation'] = $object->getMemoryReservation();
        }
        if ($object->isInitialized('memorySwap') && $object->getMemorySwap() !== null) {
            $data['MemorySwap'] = $object->getMemorySwap();
        }
        if ($object->isInitialized('memorySwappiness') && $object->getMemorySwappiness() !== null) {
            $data['MemorySwappiness'] = $object->getMemorySwappiness();
        }
        if ($object->isInitialized('nanoCPUs') && $object->getNanoCPUs() !== null) {
            $data['NanoCPUs'] = $object->getNanoCPUs();
        }
        if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
            $data['OomKillDisable'] = $object->getOomKillDisable();
        }
        if ($object->isInitialized('init') && $object->getInit() !== null) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('pidsLimit') && $object->getPidsLimit() !== null) {
            $data['PidsLimit'] = $object->getPidsLimit();
        }
        if ($object->isInitialized('ulimits') && $object->getUlimits() !== null) {
            $values_8 = [];
            foreach ($object->getUlimits() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Ulimits'] = $values_8;
        }
        if ($object->isInitialized('cpuCount') && $object->getCpuCount() !== null) {
            $data['CpuCount'] = $object->getCpuCount();
        }
        if ($object->isInitialized('cpuPercent') && $object->getCpuPercent() !== null) {
            $data['CpuPercent'] = $object->getCpuPercent();
        }
        if ($object->isInitialized('iOMaximumIOps') && $object->getIOMaximumIOps() !== null) {
            $data['IOMaximumIOps'] = $object->getIOMaximumIOps();
        }
        if ($object->isInitialized('iOMaximumBandwidth') && $object->getIOMaximumBandwidth() !== null) {
            $data['IOMaximumBandwidth'] = $object->getIOMaximumBandwidth();
        }
        if ($object->isInitialized('binds') && $object->getBinds() !== null) {
            $values_9 = [];
            foreach ($object->getBinds() as $value_9) {
                $values_9[] = $value_9;
            }
            $data['Binds'] = $values_9;
        }
        if ($object->isInitialized('containerIDFile') && $object->getContainerIDFile() !== null) {
            $data['ContainerIDFile'] = $object->getContainerIDFile();
        }
        if ($object->isInitialized('logConfig') && $object->getLogConfig() !== null) {
            $data['LogConfig'] = $this->normalizer->normalize($object->getLogConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkMode') && $object->getNetworkMode() !== null) {
            $data['NetworkMode'] = $object->getNetworkMode();
        }
        if ($object->isInitialized('portBindings') && $object->getPortBindings() !== null) {
            $values_10 = [];
            foreach ($object->getPortBindings() as $key => $value_10) {
                $values_11 = [];
                foreach ($value_10 as $value_11) {
                    $values_11[] = $this->normalizer->normalize($value_11, 'json', $context);
                }
                $values_10[$key] = $values_11;
            }
            $data['PortBindings'] = $values_10;
        }
        if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
            $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
        }
        if ($object->isInitialized('autoRemove') && $object->getAutoRemove() !== null) {
            $data['AutoRemove'] = $object->getAutoRemove();
        }
        if ($object->isInitialized('volumeDriver') && $object->getVolumeDriver() !== null) {
            $data['VolumeDriver'] = $object->getVolumeDriver();
        }
        if ($object->isInitialized('volumesFrom') && $object->getVolumesFrom() !== null) {
            $values_12 = [];
            foreach ($object->getVolumesFrom() as $value_12) {
                $values_12[] = $value_12;
            }
            $data['VolumesFrom'] = $values_12;
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_13 = [];
            foreach ($object->getMounts() as $value_13) {
                $values_13[] = $this->normalizer->normalize($value_13, 'json', $context);
            }
            $data['Mounts'] = $values_13;
        }
        if ($object->isInitialized('capAdd') && $object->getCapAdd() !== null) {
            $values_14 = [];
            foreach ($object->getCapAdd() as $value_14) {
                $values_14[] = $value_14;
            }
            $data['CapAdd'] = $values_14;
        }
        if ($object->isInitialized('capDrop') && $object->getCapDrop() !== null) {
            $values_15 = [];
            foreach ($object->getCapDrop() as $value_15) {
                $values_15[] = $value_15;
            }
            $data['CapDrop'] = $values_15;
        }
        if ($object->isInitialized('cgroupnsMode') && $object->getCgroupnsMode() !== null) {
            $data['CgroupnsMode'] = $object->getCgroupnsMode();
        }
        if ($object->isInitialized('dns') && $object->getDns() !== null) {
            $values_16 = [];
            foreach ($object->getDns() as $value_16) {
                $values_16[] = $value_16;
            }
            $data['Dns'] = $values_16;
        }
        if ($object->isInitialized('dnsOptions') && $object->getDnsOptions() !== null) {
            $values_17 = [];
            foreach ($object->getDnsOptions() as $value_17) {
                $values_17[] = $value_17;
            }
            $data['DnsOptions'] = $values_17;
        }
        if ($object->isInitialized('dnsSearch') && $object->getDnsSearch() !== null) {
            $values_18 = [];
            foreach ($object->getDnsSearch() as $value_18) {
                $values_18[] = $value_18;
            }
            $data['DnsSearch'] = $values_18;
        }
        if ($object->isInitialized('extraHosts') && $object->getExtraHosts() !== null) {
            $values_19 = [];
            foreach ($object->getExtraHosts() as $value_19) {
                $values_19[] = $value_19;
            }
            $data['ExtraHosts'] = $values_19;
        }
        if ($object->isInitialized('groupAdd') && $object->getGroupAdd() !== null) {
            $values_20 = [];
            foreach ($object->getGroupAdd() as $value_20) {
                $values_20[] = $value_20;
            }
            $data['GroupAdd'] = $values_20;
        }
        if ($object->isInitialized('ipcMode') && $object->getIpcMode() !== null) {
            $data['IpcMode'] = $object->getIpcMode();
        }
        if ($object->isInitialized('cgroup') && $object->getCgroup() !== null) {
            $data['Cgroup'] = $object->getCgroup();
        }
        if ($object->isInitialized('links') && $object->getLinks() !== null) {
            $values_21 = [];
            foreach ($object->getLinks() as $value_21) {
                $values_21[] = $value_21;
            }
            $data['Links'] = $values_21;
        }
        if ($object->isInitialized('oomScoreAdj') && $object->getOomScoreAdj() !== null) {
            $data['OomScoreAdj'] = $object->getOomScoreAdj();
        }
        if ($object->isInitialized('pidMode') && $object->getPidMode() !== null) {
            $data['PidMode'] = $object->getPidMode();
        }
        if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
            $data['Privileged'] = $object->getPrivileged();
        }
        if ($object->isInitialized('publishAllPorts') && $object->getPublishAllPorts() !== null) {
            $data['PublishAllPorts'] = $object->getPublishAllPorts();
        }
        if ($object->isInitialized('readonlyRootfs') && $object->getReadonlyRootfs() !== null) {
            $data['ReadonlyRootfs'] = $object->getReadonlyRootfs();
        }
        if ($object->isInitialized('securityOpt') && $object->getSecurityOpt() !== null) {
            $values_22 = [];
            foreach ($object->getSecurityOpt() as $value_22) {
                $values_22[] = $value_22;
            }
            $data['SecurityOpt'] = $values_22;
        }
        if ($object->isInitialized('storageOpt') && $object->getStorageOpt() !== null) {
            $values_23 = [];
            foreach ($object->getStorageOpt() as $key_1 => $value_23) {
                $values_23[$key_1] = $value_23;
            }
            $data['StorageOpt'] = $values_23;
        }
        if ($object->isInitialized('tmpfs') && $object->getTmpfs() !== null) {
            $values_24 = [];
            foreach ($object->getTmpfs() as $key_2 => $value_24) {
                $values_24[$key_2] = $value_24;
            }
            $data['Tmpfs'] = $values_24;
        }
        if ($object->isInitialized('uTSMode') && $object->getUTSMode() !== null) {
            $data['UTSMode'] = $object->getUTSMode();
        }
        if ($object->isInitialized('usernsMode') && $object->getUsernsMode() !== null) {
            $data['UsernsMode'] = $object->getUsernsMode();
        }
        if ($object->isInitialized('shmSize') && $object->getShmSize() !== null) {
            $data['ShmSize'] = $object->getShmSize();
        }
        if ($object->isInitialized('sysctls') && $object->getSysctls() !== null) {
            $values_25 = [];
            foreach ($object->getSysctls() as $key_3 => $value_25) {
                $values_25[$key_3] = $value_25;
            }
            $data['Sysctls'] = $values_25;
        }
        if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
            $data['Runtime'] = $object->getRuntime();
        }
        if ($object->isInitialized('consoleSize') && $object->getConsoleSize() !== null) {
            $values_26 = [];
            foreach ($object->getConsoleSize() as $value_26) {
                $values_26[] = $value_26;
            }
            $data['ConsoleSize'] = $values_26;
        }
        if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('maskedPaths') && $object->getMaskedPaths() !== null) {
            $values_27 = [];
            foreach ($object->getMaskedPaths() as $value_27) {
                $values_27[] = $value_27;
            }
            $data['MaskedPaths'] = $values_27;
        }
        if ($object->isInitialized('readonlyPaths') && $object->getReadonlyPaths() !== null) {
            $values_28 = [];
            foreach ($object->getReadonlyPaths() as $value_28) {
                $values_28[] = $value_28;
            }
            $data['ReadonlyPaths'] = $values_28;
        }
        foreach ($object as $key_4 => $value_29) {
            if (preg_match('/.*/', (string) $key_4)) {
                $data[$key_4] = $value_29;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\HostConfig' => false];
    }
}
