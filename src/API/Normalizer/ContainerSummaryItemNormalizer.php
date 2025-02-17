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

class ContainerSummaryItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ContainerSummaryItem';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ContainerSummaryItem';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerSummaryItem();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('Names', $data) && $data['Names'] !== null) {
            $values = [];
            foreach ($data['Names'] as $value) {
                $values[] = $value;
            }
            $object->setNames($values);
            unset($data['Names']);
        } elseif (\array_key_exists('Names', $data) && $data['Names'] === null) {
            $object->setNames(null);
        }
        if (\array_key_exists('Image', $data) && $data['Image'] !== null) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && $data['Image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('ImageID', $data) && $data['ImageID'] !== null) {
            $object->setImageID($data['ImageID']);
            unset($data['ImageID']);
        } elseif (\array_key_exists('ImageID', $data) && $data['ImageID'] === null) {
            $object->setImageID(null);
        }
        if (\array_key_exists('Command', $data) && $data['Command'] !== null) {
            $object->setCommand($data['Command']);
            unset($data['Command']);
        } elseif (\array_key_exists('Command', $data) && $data['Command'] === null) {
            $object->setCommand(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Ports', $data) && $data['Ports'] !== null) {
            $values_1 = [];
            foreach ($data['Ports'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\Port', 'json', $context);
            }
            $object->setPorts($values_1);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && $data['Ports'] === null) {
            $object->setPorts(null);
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
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($data['State']);
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('HostConfig', $data) && $data['HostConfig'] !== null) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\\API\\Model\\ContainerSummaryItemHostConfig', 'json', $context));
            unset($data['HostConfig']);
        } elseif (\array_key_exists('HostConfig', $data) && $data['HostConfig'] === null) {
            $object->setHostConfig(null);
        }
        if (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] !== null) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\\API\\Model\\ContainerSummaryItemNetworkSettings', 'json', $context));
            unset($data['NetworkSettings']);
        } elseif (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] === null) {
            $object->setNetworkSettings(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_3 = [];
            foreach ($data['Mounts'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_3);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        foreach ($data as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_4;
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('names') && $object->getNames() !== null) {
            $values = [];
            foreach ($object->getNames() as $value) {
                $values[] = $value;
            }
            $data['Names'] = $values;
        }
        if ($object->isInitialized('image') && $object->getImage() !== null) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('imageID') && $object->getImageID() !== null) {
            $data['ImageID'] = $object->getImageID();
        }
        if ($object->isInitialized('command') && $object->getCommand() !== null) {
            $data['Command'] = $object->getCommand();
        }
        if ($object->isInitialized('created') && $object->getCreated() !== null) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('ports') && $object->getPorts() !== null) {
            $values_1 = [];
            foreach ($object->getPorts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Ports'] = $values_1;
        }
        if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
            $data['SizeRw'] = $object->getSizeRw();
        }
        if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
            $data['SizeRootFs'] = $object->getSizeRootFs();
        }
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values_2 = [];
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
        }
        if ($object->isInitialized('state') && $object->getState() !== null) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('status') && $object->getStatus() !== null) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
            $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_3 = [];
            foreach ($object->getMounts() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Mounts'] = $values_3;
        }
        foreach ($object as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_4;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ContainerSummaryItem' => false];
    }
}
