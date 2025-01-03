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

class ExecIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ExecIdJsonGetResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ExecIdJsonGetResponse200';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ExecIdJsonGetResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('CanRemove', $data) && $data['CanRemove'] !== null) {
            $object->setCanRemove($data['CanRemove']);
            unset($data['CanRemove']);
        } elseif (\array_key_exists('CanRemove', $data) && $data['CanRemove'] === null) {
            $object->setCanRemove(null);
        }
        if (\array_key_exists('DetachKeys', $data) && $data['DetachKeys'] !== null) {
            $object->setDetachKeys($data['DetachKeys']);
            unset($data['DetachKeys']);
        } elseif (\array_key_exists('DetachKeys', $data) && $data['DetachKeys'] === null) {
            $object->setDetachKeys(null);
        }
        if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
            $object->setID(null);
        }
        if (\array_key_exists('Running', $data) && $data['Running'] !== null) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        } elseif (\array_key_exists('Running', $data) && $data['Running'] === null) {
            $object->setRunning(null);
        }
        if (\array_key_exists('ExitCode', $data) && $data['ExitCode'] !== null) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && $data['ExitCode'] === null) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('ProcessConfig', $data) && $data['ProcessConfig'] !== null) {
            $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], 'Docker\\API\\Model\\ProcessConfig', 'json', $context));
            unset($data['ProcessConfig']);
        } elseif (\array_key_exists('ProcessConfig', $data) && $data['ProcessConfig'] === null) {
            $object->setProcessConfig(null);
        }
        if (\array_key_exists('OpenStdin', $data) && $data['OpenStdin'] !== null) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        } elseif (\array_key_exists('OpenStdin', $data) && $data['OpenStdin'] === null) {
            $object->setOpenStdin(null);
        }
        if (\array_key_exists('OpenStderr', $data) && $data['OpenStderr'] !== null) {
            $object->setOpenStderr($data['OpenStderr']);
            unset($data['OpenStderr']);
        } elseif (\array_key_exists('OpenStderr', $data) && $data['OpenStderr'] === null) {
            $object->setOpenStderr(null);
        }
        if (\array_key_exists('OpenStdout', $data) && $data['OpenStdout'] !== null) {
            $object->setOpenStdout($data['OpenStdout']);
            unset($data['OpenStdout']);
        } elseif (\array_key_exists('OpenStdout', $data) && $data['OpenStdout'] === null) {
            $object->setOpenStdout(null);
        }
        if (\array_key_exists('ContainerID', $data) && $data['ContainerID'] !== null) {
            $object->setContainerID($data['ContainerID']);
            unset($data['ContainerID']);
        } elseif (\array_key_exists('ContainerID', $data) && $data['ContainerID'] === null) {
            $object->setContainerID(null);
        }
        if (\array_key_exists('Pid', $data) && $data['Pid'] !== null) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        } elseif (\array_key_exists('Pid', $data) && $data['Pid'] === null) {
            $object->setPid(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('canRemove') && $object->getCanRemove() !== null) {
            $data['CanRemove'] = $object->getCanRemove();
        }
        if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
            $data['DetachKeys'] = $object->getDetachKeys();
        }
        if ($object->isInitialized('iD') && $object->getID() !== null) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('running') && $object->getRunning() !== null) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('processConfig') && $object->getProcessConfig() !== null) {
            $data['ProcessConfig'] = $this->normalizer->normalize($object->getProcessConfig(), 'json', $context);
        }
        if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('openStderr') && $object->getOpenStderr() !== null) {
            $data['OpenStderr'] = $object->getOpenStderr();
        }
        if ($object->isInitialized('openStdout') && $object->getOpenStdout() !== null) {
            $data['OpenStdout'] = $object->getOpenStdout();
        }
        if ($object->isInitialized('containerID') && $object->getContainerID() !== null) {
            $data['ContainerID'] = $object->getContainerID();
        }
        if ($object->isInitialized('pid') && $object->getPid() !== null) {
            $data['Pid'] = $object->getPid();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\\API\\Model\\ExecIdJsonGetResponse200' => false];
    }
}
