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

class ContainersIdUpdatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ContainersIdUpdatePostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ContainersIdUpdatePostBody';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainersIdUpdatePostBody();
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
        if (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] !== null) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\\API\\Model\\RestartPolicy', 'json', $context));
            unset($data['RestartPolicy']);
        } elseif (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] === null) {
            $object->setRestartPolicy(null);
        }
        foreach ($data as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_9;
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
        if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
            $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
        }
        foreach ($object as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_9;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ContainersIdUpdatePostBody' => false];
    }
}
