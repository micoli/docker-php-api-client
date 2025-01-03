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

class ContainerStateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\\API\\Model\\ContainerState';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && $data::class === 'Docker\\API\\Model\\ContainerState';
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerState();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('Running', $data) && $data['Running'] !== null) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        } elseif (\array_key_exists('Running', $data) && $data['Running'] === null) {
            $object->setRunning(null);
        }
        if (\array_key_exists('Paused', $data) && $data['Paused'] !== null) {
            $object->setPaused($data['Paused']);
            unset($data['Paused']);
        } elseif (\array_key_exists('Paused', $data) && $data['Paused'] === null) {
            $object->setPaused(null);
        }
        if (\array_key_exists('Restarting', $data) && $data['Restarting'] !== null) {
            $object->setRestarting($data['Restarting']);
            unset($data['Restarting']);
        } elseif (\array_key_exists('Restarting', $data) && $data['Restarting'] === null) {
            $object->setRestarting(null);
        }
        if (\array_key_exists('OOMKilled', $data) && $data['OOMKilled'] !== null) {
            $object->setOOMKilled($data['OOMKilled']);
            unset($data['OOMKilled']);
        } elseif (\array_key_exists('OOMKilled', $data) && $data['OOMKilled'] === null) {
            $object->setOOMKilled(null);
        }
        if (\array_key_exists('Dead', $data) && $data['Dead'] !== null) {
            $object->setDead($data['Dead']);
            unset($data['Dead']);
        } elseif (\array_key_exists('Dead', $data) && $data['Dead'] === null) {
            $object->setDead(null);
        }
        if (\array_key_exists('Pid', $data) && $data['Pid'] !== null) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        } elseif (\array_key_exists('Pid', $data) && $data['Pid'] === null) {
            $object->setPid(null);
        }
        if (\array_key_exists('ExitCode', $data) && $data['ExitCode'] !== null) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && $data['ExitCode'] === null) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('Error', $data) && $data['Error'] !== null) {
            $object->setError($data['Error']);
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && $data['Error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('StartedAt', $data) && $data['StartedAt'] !== null) {
            $object->setStartedAt($data['StartedAt']);
            unset($data['StartedAt']);
        } elseif (\array_key_exists('StartedAt', $data) && $data['StartedAt'] === null) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('FinishedAt', $data) && $data['FinishedAt'] !== null) {
            $object->setFinishedAt($data['FinishedAt']);
            unset($data['FinishedAt']);
        } elseif (\array_key_exists('FinishedAt', $data) && $data['FinishedAt'] === null) {
            $object->setFinishedAt(null);
        }
        if (\array_key_exists('Health', $data) && $data['Health'] !== null) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'Docker\\API\\Model\\Health', 'json', $context));
            unset($data['Health']);
        } elseif (\array_key_exists('Health', $data) && $data['Health'] === null) {
            $object->setHealth(null);
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
        if ($object->isInitialized('status') && $object->getStatus() !== null) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('running') && $object->getRunning() !== null) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('paused') && $object->getPaused() !== null) {
            $data['Paused'] = $object->getPaused();
        }
        if ($object->isInitialized('restarting') && $object->getRestarting() !== null) {
            $data['Restarting'] = $object->getRestarting();
        }
        if ($object->isInitialized('oOMKilled') && $object->getOOMKilled() !== null) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if ($object->isInitialized('dead') && $object->getDead() !== null) {
            $data['Dead'] = $object->getDead();
        }
        if ($object->isInitialized('pid') && $object->getPid() !== null) {
            $data['Pid'] = $object->getPid();
        }
        if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('error') && $object->getError() !== null) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('startedAt') && $object->getStartedAt() !== null) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if ($object->isInitialized('finishedAt') && $object->getFinishedAt() !== null) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if ($object->isInitialized('health') && $object->getHealth() !== null) {
            $data['Health'] = $this->normalizer->normalize($object->getHealth(), 'json', $context);
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
        return ['Docker\\API\\Model\\ContainerState' => false];
    }
}
