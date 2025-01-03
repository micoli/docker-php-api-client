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

class SystemVersionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\SystemVersion';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\SystemVersion';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemVersion();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Platform', $data) && $data['Platform'] !== null) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\\API\\Model\\SystemVersionPlatform', 'json', $context));
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && $data['Platform'] === null) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('Components', $data) && $data['Components'] !== null) {
            $values = [];
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\SystemVersionComponentsItem', 'json', $context);
            }
            $object->setComponents($values);
            unset($data['Components']);
        } elseif (\array_key_exists('Components', $data) && $data['Components'] === null) {
            $object->setComponents(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($data['Version']);
            unset($data['Version']);
        } elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('ApiVersion', $data) && $data['ApiVersion'] !== null) {
            $object->setApiVersion($data['ApiVersion']);
            unset($data['ApiVersion']);
        } elseif (\array_key_exists('ApiVersion', $data) && $data['ApiVersion'] === null) {
            $object->setApiVersion(null);
        }
        if (\array_key_exists('MinAPIVersion', $data) && $data['MinAPIVersion'] !== null) {
            $object->setMinAPIVersion($data['MinAPIVersion']);
            unset($data['MinAPIVersion']);
        } elseif (\array_key_exists('MinAPIVersion', $data) && $data['MinAPIVersion'] === null) {
            $object->setMinAPIVersion(null);
        }
        if (\array_key_exists('GitCommit', $data) && $data['GitCommit'] !== null) {
            $object->setGitCommit($data['GitCommit']);
            unset($data['GitCommit']);
        } elseif (\array_key_exists('GitCommit', $data) && $data['GitCommit'] === null) {
            $object->setGitCommit(null);
        }
        if (\array_key_exists('GoVersion', $data) && $data['GoVersion'] !== null) {
            $object->setGoVersion($data['GoVersion']);
            unset($data['GoVersion']);
        } elseif (\array_key_exists('GoVersion', $data) && $data['GoVersion'] === null) {
            $object->setGoVersion(null);
        }
        if (\array_key_exists('Os', $data) && $data['Os'] !== null) {
            $object->setOs($data['Os']);
            unset($data['Os']);
        } elseif (\array_key_exists('Os', $data) && $data['Os'] === null) {
            $object->setOs(null);
        }
        if (\array_key_exists('Arch', $data) && $data['Arch'] !== null) {
            $object->setArch($data['Arch']);
            unset($data['Arch']);
        } elseif (\array_key_exists('Arch', $data) && $data['Arch'] === null) {
            $object->setArch(null);
        }
        if (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] !== null) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        } elseif (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] === null) {
            $object->setKernelVersion(null);
        }
        if (\array_key_exists('Experimental', $data) && $data['Experimental'] !== null) {
            $object->setExperimental($data['Experimental']);
            unset($data['Experimental']);
        } elseif (\array_key_exists('Experimental', $data) && $data['Experimental'] === null) {
            $object->setExperimental(null);
        }
        if (\array_key_exists('BuildTime', $data) && $data['BuildTime'] !== null) {
            $object->setBuildTime($data['BuildTime']);
            unset($data['BuildTime']);
        } elseif (\array_key_exists('BuildTime', $data) && $data['BuildTime'] === null) {
            $object->setBuildTime(null);
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
    public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
            $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
        }
        if ($object->isInitialized('components') && $object->getComponents() !== null) {
            $values = [];
            foreach ($object->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Components'] = $values;
        }
        if ($object->isInitialized('version') && $object->getVersion() !== null) {
            $data['Version'] = $object->getVersion();
        }
        if ($object->isInitialized('apiVersion') && $object->getApiVersion() !== null) {
            $data['ApiVersion'] = $object->getApiVersion();
        }
        if ($object->isInitialized('minAPIVersion') && $object->getMinAPIVersion() !== null) {
            $data['MinAPIVersion'] = $object->getMinAPIVersion();
        }
        if ($object->isInitialized('gitCommit') && $object->getGitCommit() !== null) {
            $data['GitCommit'] = $object->getGitCommit();
        }
        if ($object->isInitialized('goVersion') && $object->getGoVersion() !== null) {
            $data['GoVersion'] = $object->getGoVersion();
        }
        if ($object->isInitialized('os') && $object->getOs() !== null) {
            $data['Os'] = $object->getOs();
        }
        if ($object->isInitialized('arch') && $object->getArch() !== null) {
            $data['Arch'] = $object->getArch();
        }
        if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
            $data['KernelVersion'] = $object->getKernelVersion();
        }
        if ($object->isInitialized('experimental') && $object->getExperimental() !== null) {
            $data['Experimental'] = $object->getExperimental();
        }
        if ($object->isInitialized('buildTime') && $object->getBuildTime() !== null) {
            $data['BuildTime'] = $object->getBuildTime();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\SystemVersion' => false];
    }
}
