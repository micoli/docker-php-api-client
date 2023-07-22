<?php

declare(strict_types=1);

namespace Docker\API\Model;

use ArrayObject;

class SystemInfo extends ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Unique identifier of the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: The format of the ID itself is not part of the API, and
     * > should not be considered stable.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Total number of containers on the host.
     *
     * @var int|null
     */
    protected $containers;
    /**
     * Number of containers with status `"running"`.
     *
     * @var int|null
     */
    protected $containersRunning;
    /**
     * Number of containers with status `"paused"`.
     *
     * @var int|null
     */
    protected $containersPaused;
    /**
     * Number of containers with status `"stopped"`.
     *
     * @var int|null
     */
    protected $containersStopped;
    /**
     * Total number of images on the host.
     *
     * Both _tagged_ and _untagged_ (dangling) images are counted.
     *
     * @var int|null
     */
    protected $images;
    /**
     * Name of the storage driver in use.
     *
     * @var string|null
     */
    protected $driver;
    /**
     * Information specific to the storage driver, provided as
     * "label" / "value" pairs.
     *
     * This information is provided by the storage driver, and formatted
     * in a way consistent with the output of `docker info` on the command
     * line.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @var string[][]|null
     */
    protected $driverStatus;
    /**
     * Root directory of persistent Docker state.
     *
     * Defaults to `/var/lib/docker` on Linux, and `C:\ProgramData\docker`
     * on Windows.
     *
     * @var string|null
     */
    protected $dockerRootDir;
    /**
     * Available plugins per type.
     *
     * <p><br /></p>
     *
     * > **Note**: Only unmanaged (V1) plugins are included in this list.
     * > V1 plugins are "lazily" loaded, and are not returned in this list
     * > if there is no resource using the plugin.
     *
     * @var PluginsInfo|null
     */
    protected $plugins;
    /**
     * Indicates if the host has memory limit support enabled.
     *
     * @var bool|null
     */
    protected $memoryLimit;
    /**
     * Indicates if the host has memory swap limit support enabled.
     *
     * @var bool|null
     */
    protected $swapLimit;
    /**
     * Indicates if the host has kernel memory limit support enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated as the kernel 5.4 deprecated
     * > `kmem.limit_in_bytes`.
     *
     * @var bool|null
     */
    protected $kernelMemory;
    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) period is supported by
     * the host.
     *
     * @var bool|null
     */
    protected $cpuCfsPeriod;
    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) quota is supported by
     * the host.
     *
     * @var bool|null
     */
    protected $cpuCfsQuota;
    /**
     * Indicates if CPU Shares limiting is supported by the host.
     *
     * @var bool|null
     */
    protected $cPUShares;
    /**
     * Indicates if CPUsets (cpuset.cpus, cpuset.mems) are supported by the host.
     *
     * See [cpuset(7)](https://www.kernel.org/doc/Documentation/cgroup-v1/cpusets.txt)
     *
     * @var bool|null
     */
    protected $cPUSet;
    /**
     * Indicates if the host kernel has PID limit support enabled.
     *
     * @var bool|null
     */
    protected $pidsLimit;
    /**
     * Indicates if OOM killer disable is supported on the host.
     *
     * @var bool|null
     */
    protected $oomKillDisable;
    /**
     * Indicates IPv4 forwarding is enabled.
     *
     * @var bool|null
     */
    protected $iPv4Forwarding;
    /**
     * Indicates if `bridge-nf-call-iptables` is available on the host.
     *
     * @var bool|null
     */
    protected $bridgeNfIptables;
    /**
     * Indicates if `bridge-nf-call-ip6tables` is available on the host.
     *
     * @var bool|null
     */
    protected $bridgeNfIp6tables;
    /**
     * Indicates if the daemon is running in debug-mode / with debug-level
     * logging enabled.
     *
     * @var bool|null
     */
    protected $debug;
    /**
     * The total number of file Descriptors in use by the daemon process.
     *
     * This information is only returned if debug-mode is enabled.
     *
     * @var int|null
     */
    protected $nFd;
    /**
     * The  number of goroutines that currently exist.
     *
     * This information is only returned if debug-mode is enabled.
     *
     * @var int|null
     */
    protected $nGoroutines;
    /**
     * Current system-time in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * format with nano-seconds.
     *
     * @var string|null
     */
    protected $systemTime;
    /**
     * The logging driver to use as a default for new containers.
     *
     * @var string|null
     */
    protected $loggingDriver;
    /**
     * The driver to use for managing cgroups.
     *
     * @var string|null
     */
    protected $cgroupDriver = 'cgroupfs';
    /**
     * The version of the cgroup.
     *
     * @var string|null
     */
    protected $cgroupVersion = '1';
    /**
     * Number of event listeners subscribed.
     *
     * @var int|null
     */
    protected $nEventsListener;
    /**
     * Kernel version of the host.
     *
     * On Linux, this information obtained from `uname`. On Windows this
     * information is queried from the <kbd>HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\</kbd>
     * registry value, for example _"10.0 14393 (14393.1198.amd64fre.rs1_release_sec.170427-1353)"_.
     *
     * @var string|null
     */
    protected $kernelVersion;
    /**
     * Name of the host's operating system, for example: "Ubuntu 16.04.2 LTS"
     * or "Windows Server 2016 Datacenter"
     *
     * @var string|null
     */
    protected $operatingSystem;
    /**
     * Version of the host's operating system
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including its
     * > very existence, and the formatting of values, should not be considered
     * > stable, and may change without notice.
     *
     * @var string|null
     */
    protected $oSVersion;
    /**
     * Generic type of the operating system of the host, as returned by the
     * Go runtime (`GOOS`).
     *
     * Currently returned values are "linux" and "windows". A full list of
     * possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     *
     * @var string|null
     */
    protected $oSType;
    /**
     * Hardware architecture of the host, as returned by the Go runtime
     * (`GOARCH`).
     *
     * A full list of possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     *
     * @var string|null
     */
    protected $architecture;
    /**
     * The number of logical CPUs usable by the daemon.
     *
     * The number of available CPUs is checked by querying the operating
     * system when the daemon starts. Changes to operating system CPU
     * allocation after the daemon is started are not reflected.
     *
     * @var int|null
     */
    protected $nCPU;
    /**
     * Total amount of physical memory available on the host, in bytes.
     *
     * @var int|null
     */
    protected $memTotal;
    /**
     * Address / URL of the index server that is used for image search,
     * and as a default for user authentication for Docker Hub and Docker Cloud.
     *
     * @var string|null
     */
    protected $indexServerAddress = 'https://index.docker.io/v1/';
    /**
     * RegistryServiceConfig stores daemon registry services configuration.
     *
     * @var RegistryServiceConfig|null
     */
    protected $registryConfig;
    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @var GenericResourcesItem[]|null
     */
    protected $genericResources;
    /**
     * HTTP-proxy configured for the daemon. This value is obtained from the
     * [`HTTP_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     *
     * @var string|null
     */
    protected $httpProxy;
    /**
     * HTTPS-proxy configured for the daemon. This value is obtained from the
     * [`HTTPS_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     *
     * @var string|null
     */
    protected $httpsProxy;
    /**
     * Comma-separated list of domain extensions for which no proxy should be
     * used. This value is obtained from the [`NO_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html)
     * environment variable.
     *
     * Containers do not automatically inherit this configuration.
     *
     * @var string|null
     */
    protected $noProxy;
    /**
     * Hostname of the host.
     *
     * @var string|null
     */
    protected $name;
    /**
     * User-defined labels (key/value metadata) as set on the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: When part of a Swarm, nodes can both have _daemon_ labels,
     * > set through the daemon configuration, and _node_ labels, set from a
     * > manager node in the Swarm. Node labels are not included in this
     * > field. Node labels can be retrieved using the `/nodes/(id)` endpoint
     * > on a manager node in the Swarm.
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * Indicates if experimental features are enabled on the daemon.
     *
     * @var bool|null
     */
    protected $experimentalBuild;
    /**
     * Version string of the daemon.
     *
     * > **Note**: the [standalone Swarm API](https://docs.docker.com/swarm/swarm-api/)
     * > returns the Swarm version instead of the daemon  version, for example
     * > `swarm/1.2.8`.
     *
     * @var string|null
     */
    protected $serverVersion;
    /**
     * URL of the distributed storage backend.
     *
     * The storage backend is used for multihost networking (to store
     * network and endpoint information) and by the node discovery mechanism.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     *
     * @var string|null
     */
    protected $clusterStore;
    /**
     * The network endpoint that the Engine advertises for the purpose of
     * node discovery. ClusterAdvertise is a `host:port` combination on which
     * the daemon is reachable by other hosts.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     *
     * @var string|null
     */
    protected $clusterAdvertise;
    /**
     * List of [OCI compliant](https://github.com/opencontainers/runtime-spec)
     * runtimes configured on the daemon. Keys hold the "name" used to
     * reference the runtime.
     *
     * The Docker daemon relies on an OCI compliant runtime (invoked via the
     * `containerd` daemon) as its interface to the Linux kernel namespaces,
     * cgroups, and SELinux.
     *
     * The default runtime is `runc`, and automatically configured. Additional
     * runtimes can be configured by the user and will be listed here.
     *
     * @var Runtime[]|null
     */
    protected $runtimes;
    /**
     * Name of the default OCI runtime that is used when starting containers.
     *
     * The default can be overridden per-container at create time.
     *
     * @var string|null
     */
    protected $defaultRuntime = 'runc';
    /**
     * Represents generic information about swarm.
     *
     * @var SwarmInfo|null
     */
    protected $swarm;
    /**
     * Indicates if live restore is enabled.
     *
     * If enabled, containers are kept running when the daemon is shutdown
     * or upon daemon start if running containers are detected.
     *
     * @var bool|null
     */
    protected $liveRestoreEnabled = false;
    /**
     * Represents the isolation technology to use as a default for containers.
     * The supported values are platform-specific.
     *
     * If no isolation value is specified on daemon start, on Windows client,
     * the default is `hyperv`, and on Windows server, the default is `process`.
     *
     * This option is currently not used on other platforms.
     *
     * @var string|null
     */
    protected $isolation = 'default';
    /**
     * Name and, optional, path of the `docker-init` binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     *
     * @var string|null
     */
    protected $initBinary;
    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     *
     * @var Commit|null
     */
    protected $containerdCommit;
    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     *
     * @var Commit|null
     */
    protected $runcCommit;
    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     *
     * @var Commit|null
     */
    protected $initCommit;
    /**
     * List of security features that are enabled on the daemon, such as
     * apparmor, seccomp, SELinux, user-namespaces (userns), and rootless.
     *
     * Additional configuration options for each security feature may
     * be present, and are included as a comma-separated list of key/value
     * pairs.
     *
     * @var string[]|null
     */
    protected $securityOptions;
    /**
     * Reports a summary of the product license on the daemon.
     *
     * If a commercial license has been applied to the daemon, information
     * such as number of nodes, and expiration are included.
     *
     * @var string|null
     */
    protected $productLicense;
    /**
     * List of custom default address pools for local networks, which can be
     * specified in the daemon.json file or dockerd option.
     *
     * Example: a Base "10.10.0.0/16" with Size 24 will define the set of 256
     * 10.10.[0-255].0/24 address pools.
     *
     * @var SystemInfoDefaultAddressPoolsItem[]|null
     */
    protected $defaultAddressPools;
    /**
     * List of warnings / informational messages about missing features, or
     * issues related to the daemon configuration.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @var string[]|null
     */
    protected $warnings;

    /**
     * Unique identifier of the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: The format of the ID itself is not part of the API, and
     * > should not be considered stable.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * Unique identifier of the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: The format of the ID itself is not part of the API, and
     * > should not be considered stable.
     */
    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Total number of containers on the host.
     */
    public function getContainers(): ?int
    {
        return $this->containers;
    }

    /**
     * Total number of containers on the host.
     */
    public function setContainers(?int $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * Number of containers with status `"running"`.
     */
    public function getContainersRunning(): ?int
    {
        return $this->containersRunning;
    }

    /**
     * Number of containers with status `"running"`.
     */
    public function setContainersRunning(?int $containersRunning): self
    {
        $this->initialized['containersRunning'] = true;
        $this->containersRunning = $containersRunning;

        return $this;
    }

    /**
     * Number of containers with status `"paused"`.
     */
    public function getContainersPaused(): ?int
    {
        return $this->containersPaused;
    }

    /**
     * Number of containers with status `"paused"`.
     */
    public function setContainersPaused(?int $containersPaused): self
    {
        $this->initialized['containersPaused'] = true;
        $this->containersPaused = $containersPaused;

        return $this;
    }

    /**
     * Number of containers with status `"stopped"`.
     */
    public function getContainersStopped(): ?int
    {
        return $this->containersStopped;
    }

    /**
     * Number of containers with status `"stopped"`.
     */
    public function setContainersStopped(?int $containersStopped): self
    {
        $this->initialized['containersStopped'] = true;
        $this->containersStopped = $containersStopped;

        return $this;
    }

    /**
     * Total number of images on the host.
     *
     * Both _tagged_ and _untagged_ (dangling) images are counted.
     */
    public function getImages(): ?int
    {
        return $this->images;
    }

    /**
     * Total number of images on the host.
     *
     * Both _tagged_ and _untagged_ (dangling) images are counted.
     */
    public function setImages(?int $images): self
    {
        $this->initialized['images'] = true;
        $this->images = $images;

        return $this;
    }

    /**
     * Name of the storage driver in use.
     */
    public function getDriver(): ?string
    {
        return $this->driver;
    }

    /**
     * Name of the storage driver in use.
     */
    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Information specific to the storage driver, provided as
     * "label" / "value" pairs.
     *
     * This information is provided by the storage driver, and formatted
     * in a way consistent with the output of `docker info` on the command
     * line.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @return string[][]|null
     */
    public function getDriverStatus(): ?array
    {
        return $this->driverStatus;
    }

    /**
     * Information specific to the storage driver, provided as
     * "label" / "value" pairs.
     *
     * This information is provided by the storage driver, and formatted
     * in a way consistent with the output of `docker info` on the command
     * line.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @param string[][]|null $driverStatus
     */
    public function setDriverStatus(?array $driverStatus): self
    {
        $this->initialized['driverStatus'] = true;
        $this->driverStatus = $driverStatus;

        return $this;
    }

    /**
     * Root directory of persistent Docker state.
     *
     * Defaults to `/var/lib/docker` on Linux, and `C:\ProgramData\docker`
     * on Windows.
     */
    public function getDockerRootDir(): ?string
    {
        return $this->dockerRootDir;
    }

    /**
     * Root directory of persistent Docker state.
     *
     * Defaults to `/var/lib/docker` on Linux, and `C:\ProgramData\docker`
     * on Windows.
     */
    public function setDockerRootDir(?string $dockerRootDir): self
    {
        $this->initialized['dockerRootDir'] = true;
        $this->dockerRootDir = $dockerRootDir;

        return $this;
    }

    /**
     * Available plugins per type.
     *
     * <p><br /></p>
     *
     * > **Note**: Only unmanaged (V1) plugins are included in this list.
     * > V1 plugins are "lazily" loaded, and are not returned in this list
     * > if there is no resource using the plugin.
     */
    public function getPlugins(): ?PluginsInfo
    {
        return $this->plugins;
    }

    /**
     * Available plugins per type.
     *
     * <p><br /></p>
     *
     * > **Note**: Only unmanaged (V1) plugins are included in this list.
     * > V1 plugins are "lazily" loaded, and are not returned in this list
     * > if there is no resource using the plugin.
     */
    public function setPlugins(?PluginsInfo $plugins): self
    {
        $this->initialized['plugins'] = true;
        $this->plugins = $plugins;

        return $this;
    }

    /**
     * Indicates if the host has memory limit support enabled.
     */
    public function getMemoryLimit(): ?bool
    {
        return $this->memoryLimit;
    }

    /**
     * Indicates if the host has memory limit support enabled.
     */
    public function setMemoryLimit(?bool $memoryLimit): self
    {
        $this->initialized['memoryLimit'] = true;
        $this->memoryLimit = $memoryLimit;

        return $this;
    }

    /**
     * Indicates if the host has memory swap limit support enabled.
     */
    public function getSwapLimit(): ?bool
    {
        return $this->swapLimit;
    }

    /**
     * Indicates if the host has memory swap limit support enabled.
     */
    public function setSwapLimit(?bool $swapLimit): self
    {
        $this->initialized['swapLimit'] = true;
        $this->swapLimit = $swapLimit;

        return $this;
    }

    /**
     * Indicates if the host has kernel memory limit support enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated as the kernel 5.4 deprecated
     * > `kmem.limit_in_bytes`.
     */
    public function getKernelMemory(): ?bool
    {
        return $this->kernelMemory;
    }

    /**
     * Indicates if the host has kernel memory limit support enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated as the kernel 5.4 deprecated
     * > `kmem.limit_in_bytes`.
     */
    public function setKernelMemory(?bool $kernelMemory): self
    {
        $this->initialized['kernelMemory'] = true;
        $this->kernelMemory = $kernelMemory;

        return $this;
    }

    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) period is supported by
     * the host.
     */
    public function getCpuCfsPeriod(): ?bool
    {
        return $this->cpuCfsPeriod;
    }

    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) period is supported by
     * the host.
     */
    public function setCpuCfsPeriod(?bool $cpuCfsPeriod): self
    {
        $this->initialized['cpuCfsPeriod'] = true;
        $this->cpuCfsPeriod = $cpuCfsPeriod;

        return $this;
    }

    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) quota is supported by
     * the host.
     */
    public function getCpuCfsQuota(): ?bool
    {
        return $this->cpuCfsQuota;
    }

    /**
     * Indicates if CPU CFS(Completely Fair Scheduler) quota is supported by
     * the host.
     */
    public function setCpuCfsQuota(?bool $cpuCfsQuota): self
    {
        $this->initialized['cpuCfsQuota'] = true;
        $this->cpuCfsQuota = $cpuCfsQuota;

        return $this;
    }

    /**
     * Indicates if CPU Shares limiting is supported by the host.
     */
    public function getCPUShares(): ?bool
    {
        return $this->cPUShares;
    }

    /**
     * Indicates if CPU Shares limiting is supported by the host.
     */
    public function setCPUShares(?bool $cPUShares): self
    {
        $this->initialized['cPUShares'] = true;
        $this->cPUShares = $cPUShares;

        return $this;
    }

    /**
     * Indicates if CPUsets (cpuset.cpus, cpuset.mems) are supported by the host.
     *
     * See [cpuset(7)](https://www.kernel.org/doc/Documentation/cgroup-v1/cpusets.txt)
     */
    public function getCPUSet(): ?bool
    {
        return $this->cPUSet;
    }

    /**
     * Indicates if CPUsets (cpuset.cpus, cpuset.mems) are supported by the host.
     *
     * See [cpuset(7)](https://www.kernel.org/doc/Documentation/cgroup-v1/cpusets.txt)
     */
    public function setCPUSet(?bool $cPUSet): self
    {
        $this->initialized['cPUSet'] = true;
        $this->cPUSet = $cPUSet;

        return $this;
    }

    /**
     * Indicates if the host kernel has PID limit support enabled.
     */
    public function getPidsLimit(): ?bool
    {
        return $this->pidsLimit;
    }

    /**
     * Indicates if the host kernel has PID limit support enabled.
     */
    public function setPidsLimit(?bool $pidsLimit): self
    {
        $this->initialized['pidsLimit'] = true;
        $this->pidsLimit = $pidsLimit;

        return $this;
    }

    /**
     * Indicates if OOM killer disable is supported on the host.
     */
    public function getOomKillDisable(): ?bool
    {
        return $this->oomKillDisable;
    }

    /**
     * Indicates if OOM killer disable is supported on the host.
     */
    public function setOomKillDisable(?bool $oomKillDisable): self
    {
        $this->initialized['oomKillDisable'] = true;
        $this->oomKillDisable = $oomKillDisable;

        return $this;
    }

    /**
     * Indicates IPv4 forwarding is enabled.
     */
    public function getIPv4Forwarding(): ?bool
    {
        return $this->iPv4Forwarding;
    }

    /**
     * Indicates IPv4 forwarding is enabled.
     */
    public function setIPv4Forwarding(?bool $iPv4Forwarding): self
    {
        $this->initialized['iPv4Forwarding'] = true;
        $this->iPv4Forwarding = $iPv4Forwarding;

        return $this;
    }

    /**
     * Indicates if `bridge-nf-call-iptables` is available on the host.
     */
    public function getBridgeNfIptables(): ?bool
    {
        return $this->bridgeNfIptables;
    }

    /**
     * Indicates if `bridge-nf-call-iptables` is available on the host.
     */
    public function setBridgeNfIptables(?bool $bridgeNfIptables): self
    {
        $this->initialized['bridgeNfIptables'] = true;
        $this->bridgeNfIptables = $bridgeNfIptables;

        return $this;
    }

    /**
     * Indicates if `bridge-nf-call-ip6tables` is available on the host.
     */
    public function getBridgeNfIp6tables(): ?bool
    {
        return $this->bridgeNfIp6tables;
    }

    /**
     * Indicates if `bridge-nf-call-ip6tables` is available on the host.
     */
    public function setBridgeNfIp6tables(?bool $bridgeNfIp6tables): self
    {
        $this->initialized['bridgeNfIp6tables'] = true;
        $this->bridgeNfIp6tables = $bridgeNfIp6tables;

        return $this;
    }

    /**
     * Indicates if the daemon is running in debug-mode / with debug-level
     * logging enabled.
     */
    public function getDebug(): ?bool
    {
        return $this->debug;
    }

    /**
     * Indicates if the daemon is running in debug-mode / with debug-level
     * logging enabled.
     */
    public function setDebug(?bool $debug): self
    {
        $this->initialized['debug'] = true;
        $this->debug = $debug;

        return $this;
    }

    /**
     * The total number of file Descriptors in use by the daemon process.
     *
     * This information is only returned if debug-mode is enabled.
     */
    public function getNFd(): ?int
    {
        return $this->nFd;
    }

    /**
     * The total number of file Descriptors in use by the daemon process.
     *
     * This information is only returned if debug-mode is enabled.
     */
    public function setNFd(?int $nFd): self
    {
        $this->initialized['nFd'] = true;
        $this->nFd = $nFd;

        return $this;
    }

    /**
     * The  number of goroutines that currently exist.
     *
     * This information is only returned if debug-mode is enabled.
     */
    public function getNGoroutines(): ?int
    {
        return $this->nGoroutines;
    }

    /**
     * The  number of goroutines that currently exist.
     *
     * This information is only returned if debug-mode is enabled.
     */
    public function setNGoroutines(?int $nGoroutines): self
    {
        $this->initialized['nGoroutines'] = true;
        $this->nGoroutines = $nGoroutines;

        return $this;
    }

    /**
     * Current system-time in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * format with nano-seconds.
     */
    public function getSystemTime(): ?string
    {
        return $this->systemTime;
    }

    /**
     * Current system-time in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * format with nano-seconds.
     */
    public function setSystemTime(?string $systemTime): self
    {
        $this->initialized['systemTime'] = true;
        $this->systemTime = $systemTime;

        return $this;
    }

    /**
     * The logging driver to use as a default for new containers.
     */
    public function getLoggingDriver(): ?string
    {
        return $this->loggingDriver;
    }

    /**
     * The logging driver to use as a default for new containers.
     */
    public function setLoggingDriver(?string $loggingDriver): self
    {
        $this->initialized['loggingDriver'] = true;
        $this->loggingDriver = $loggingDriver;

        return $this;
    }

    /**
     * The driver to use for managing cgroups.
     */
    public function getCgroupDriver(): ?string
    {
        return $this->cgroupDriver;
    }

    /**
     * The driver to use for managing cgroups.
     */
    public function setCgroupDriver(?string $cgroupDriver): self
    {
        $this->initialized['cgroupDriver'] = true;
        $this->cgroupDriver = $cgroupDriver;

        return $this;
    }

    /**
     * The version of the cgroup.
     */
    public function getCgroupVersion(): ?string
    {
        return $this->cgroupVersion;
    }

    /**
     * The version of the cgroup.
     */
    public function setCgroupVersion(?string $cgroupVersion): self
    {
        $this->initialized['cgroupVersion'] = true;
        $this->cgroupVersion = $cgroupVersion;

        return $this;
    }

    /**
     * Number of event listeners subscribed.
     */
    public function getNEventsListener(): ?int
    {
        return $this->nEventsListener;
    }

    /**
     * Number of event listeners subscribed.
     */
    public function setNEventsListener(?int $nEventsListener): self
    {
        $this->initialized['nEventsListener'] = true;
        $this->nEventsListener = $nEventsListener;

        return $this;
    }

    /**
     * Kernel version of the host.
     *
     * On Linux, this information obtained from `uname`. On Windows this
     * information is queried from the <kbd>HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\</kbd>
     * registry value, for example _"10.0 14393 (14393.1198.amd64fre.rs1_release_sec.170427-1353)"_.
     */
    public function getKernelVersion(): ?string
    {
        return $this->kernelVersion;
    }

    /**
     * Kernel version of the host.
     *
     * On Linux, this information obtained from `uname`. On Windows this
     * information is queried from the <kbd>HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\</kbd>
     * registry value, for example _"10.0 14393 (14393.1198.amd64fre.rs1_release_sec.170427-1353)"_.
     */
    public function setKernelVersion(?string $kernelVersion): self
    {
        $this->initialized['kernelVersion'] = true;
        $this->kernelVersion = $kernelVersion;

        return $this;
    }

    /**
     * Name of the host's operating system, for example: "Ubuntu 16.04.2 LTS"
     * or "Windows Server 2016 Datacenter"
     */
    public function getOperatingSystem(): ?string
    {
        return $this->operatingSystem;
    }

    /**
     * Name of the host's operating system, for example: "Ubuntu 16.04.2 LTS"
     * or "Windows Server 2016 Datacenter"
     */
    public function setOperatingSystem(?string $operatingSystem): self
    {
        $this->initialized['operatingSystem'] = true;
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Version of the host's operating system
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including its
     * > very existence, and the formatting of values, should not be considered
     * > stable, and may change without notice.
     */
    public function getOSVersion(): ?string
    {
        return $this->oSVersion;
    }

    /**
     * Version of the host's operating system
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including its
     * > very existence, and the formatting of values, should not be considered
     * > stable, and may change without notice.
     */
    public function setOSVersion(?string $oSVersion): self
    {
        $this->initialized['oSVersion'] = true;
        $this->oSVersion = $oSVersion;

        return $this;
    }

    /**
     * Generic type of the operating system of the host, as returned by the
     * Go runtime (`GOOS`).
     *
     * Currently returned values are "linux" and "windows". A full list of
     * possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     */
    public function getOSType(): ?string
    {
        return $this->oSType;
    }

    /**
     * Generic type of the operating system of the host, as returned by the
     * Go runtime (`GOOS`).
     *
     * Currently returned values are "linux" and "windows". A full list of
     * possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     */
    public function setOSType(?string $oSType): self
    {
        $this->initialized['oSType'] = true;
        $this->oSType = $oSType;

        return $this;
    }

    /**
     * Hardware architecture of the host, as returned by the Go runtime
     * (`GOARCH`).
     *
     * A full list of possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     */
    public function getArchitecture(): ?string
    {
        return $this->architecture;
    }

    /**
     * Hardware architecture of the host, as returned by the Go runtime
     * (`GOARCH`).
     *
     * A full list of possible values can be found in the [Go documentation](https://golang.org/doc/install/source#environment).
     */
    public function setArchitecture(?string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * The number of logical CPUs usable by the daemon.
     *
     * The number of available CPUs is checked by querying the operating
     * system when the daemon starts. Changes to operating system CPU
     * allocation after the daemon is started are not reflected.
     */
    public function getNCPU(): ?int
    {
        return $this->nCPU;
    }

    /**
     * The number of logical CPUs usable by the daemon.
     *
     * The number of available CPUs is checked by querying the operating
     * system when the daemon starts. Changes to operating system CPU
     * allocation after the daemon is started are not reflected.
     */
    public function setNCPU(?int $nCPU): self
    {
        $this->initialized['nCPU'] = true;
        $this->nCPU = $nCPU;

        return $this;
    }

    /**
     * Total amount of physical memory available on the host, in bytes.
     */
    public function getMemTotal(): ?int
    {
        return $this->memTotal;
    }

    /**
     * Total amount of physical memory available on the host, in bytes.
     */
    public function setMemTotal(?int $memTotal): self
    {
        $this->initialized['memTotal'] = true;
        $this->memTotal = $memTotal;

        return $this;
    }

    /**
     * Address / URL of the index server that is used for image search,
     * and as a default for user authentication for Docker Hub and Docker Cloud.
     */
    public function getIndexServerAddress(): ?string
    {
        return $this->indexServerAddress;
    }

    /**
     * Address / URL of the index server that is used for image search,
     * and as a default for user authentication for Docker Hub and Docker Cloud.
     */
    public function setIndexServerAddress(?string $indexServerAddress): self
    {
        $this->initialized['indexServerAddress'] = true;
        $this->indexServerAddress = $indexServerAddress;

        return $this;
    }

    /**
     * RegistryServiceConfig stores daemon registry services configuration.
     */
    public function getRegistryConfig(): ?RegistryServiceConfig
    {
        return $this->registryConfig;
    }

    /**
     * RegistryServiceConfig stores daemon registry services configuration.
     */
    public function setRegistryConfig(?RegistryServiceConfig $registryConfig): self
    {
        $this->initialized['registryConfig'] = true;
        $this->registryConfig = $registryConfig;

        return $this;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @return GenericResourcesItem[]|null
     */
    public function getGenericResources(): ?array
    {
        return $this->genericResources;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @param GenericResourcesItem[]|null $genericResources
     */
    public function setGenericResources(?array $genericResources): self
    {
        $this->initialized['genericResources'] = true;
        $this->genericResources = $genericResources;

        return $this;
    }

    /**
     * HTTP-proxy configured for the daemon. This value is obtained from the
     * [`HTTP_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function getHttpProxy(): ?string
    {
        return $this->httpProxy;
    }

    /**
     * HTTP-proxy configured for the daemon. This value is obtained from the
     * [`HTTP_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function setHttpProxy(?string $httpProxy): self
    {
        $this->initialized['httpProxy'] = true;
        $this->httpProxy = $httpProxy;

        return $this;
    }

    /**
     * HTTPS-proxy configured for the daemon. This value is obtained from the
     * [`HTTPS_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function getHttpsProxy(): ?string
    {
        return $this->httpsProxy;
    }

    /**
     * HTTPS-proxy configured for the daemon. This value is obtained from the
     * [`HTTPS_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html) environment variable.
     * Credentials ([user info component](https://tools.ietf.org/html/rfc3986#section-3.2.1)) in the proxy URL
     * are masked in the API response.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function setHttpsProxy(?string $httpsProxy): self
    {
        $this->initialized['httpsProxy'] = true;
        $this->httpsProxy = $httpsProxy;

        return $this;
    }

    /**
     * Comma-separated list of domain extensions for which no proxy should be
     * used. This value is obtained from the [`NO_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html)
     * environment variable.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function getNoProxy(): ?string
    {
        return $this->noProxy;
    }

    /**
     * Comma-separated list of domain extensions for which no proxy should be
     * used. This value is obtained from the [`NO_PROXY`](https://www.gnu.org/software/wget/manual/html_node/Proxies.html)
     * environment variable.
     *
     * Containers do not automatically inherit this configuration.
     */
    public function setNoProxy(?string $noProxy): self
    {
        $this->initialized['noProxy'] = true;
        $this->noProxy = $noProxy;

        return $this;
    }

    /**
     * Hostname of the host.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Hostname of the host.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * User-defined labels (key/value metadata) as set on the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: When part of a Swarm, nodes can both have _daemon_ labels,
     * > set through the daemon configuration, and _node_ labels, set from a
     * > manager node in the Swarm. Node labels are not included in this
     * > field. Node labels can be retrieved using the `/nodes/(id)` endpoint
     * > on a manager node in the Swarm.
     *
     * @return string[]|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }

    /**
     * User-defined labels (key/value metadata) as set on the daemon.
     *
     * <p><br /></p>
     *
     * > **Note**: When part of a Swarm, nodes can both have _daemon_ labels,
     * > set through the daemon configuration, and _node_ labels, set from a
     * > manager node in the Swarm. Node labels are not included in this
     * > field. Node labels can be retrieved using the `/nodes/(id)` endpoint
     * > on a manager node in the Swarm.
     *
     * @param string[]|null $labels
     */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Indicates if experimental features are enabled on the daemon.
     */
    public function getExperimentalBuild(): ?bool
    {
        return $this->experimentalBuild;
    }

    /**
     * Indicates if experimental features are enabled on the daemon.
     */
    public function setExperimentalBuild(?bool $experimentalBuild): self
    {
        $this->initialized['experimentalBuild'] = true;
        $this->experimentalBuild = $experimentalBuild;

        return $this;
    }

    /**
     * Version string of the daemon.
     *
     * > **Note**: the [standalone Swarm API](https://docs.docker.com/swarm/swarm-api/)
     * > returns the Swarm version instead of the daemon  version, for example
     * > `swarm/1.2.8`.
     */
    public function getServerVersion(): ?string
    {
        return $this->serverVersion;
    }

    /**
     * Version string of the daemon.
     *
     * > **Note**: the [standalone Swarm API](https://docs.docker.com/swarm/swarm-api/)
     * > returns the Swarm version instead of the daemon  version, for example
     * > `swarm/1.2.8`.
     */
    public function setServerVersion(?string $serverVersion): self
    {
        $this->initialized['serverVersion'] = true;
        $this->serverVersion = $serverVersion;

        return $this;
    }

    /**
     * URL of the distributed storage backend.
     *
     * The storage backend is used for multihost networking (to store
     * network and endpoint information) and by the node discovery mechanism.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     */
    public function getClusterStore(): ?string
    {
        return $this->clusterStore;
    }

    /**
     * URL of the distributed storage backend.
     *
     * The storage backend is used for multihost networking (to store
     * network and endpoint information) and by the node discovery mechanism.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     */
    public function setClusterStore(?string $clusterStore): self
    {
        $this->initialized['clusterStore'] = true;
        $this->clusterStore = $clusterStore;

        return $this;
    }

    /**
     * The network endpoint that the Engine advertises for the purpose of
     * node discovery. ClusterAdvertise is a `host:port` combination on which
     * the daemon is reachable by other hosts.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     */
    public function getClusterAdvertise(): ?string
    {
        return $this->clusterAdvertise;
    }

    /**
     * The network endpoint that the Engine advertises for the purpose of
     * node discovery. ClusterAdvertise is a `host:port` combination on which
     * the daemon is reachable by other hosts.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is only propagated when using standalone Swarm
     * > mode, and overlay networking using an external k/v store. Overlay
     * > networks with Swarm mode enabled use the built-in raft store, and
     * > this field will be empty.
     */
    public function setClusterAdvertise(?string $clusterAdvertise): self
    {
        $this->initialized['clusterAdvertise'] = true;
        $this->clusterAdvertise = $clusterAdvertise;

        return $this;
    }

    /**
     * List of [OCI compliant](https://github.com/opencontainers/runtime-spec)
     * runtimes configured on the daemon. Keys hold the "name" used to
     * reference the runtime.
     *
     * The Docker daemon relies on an OCI compliant runtime (invoked via the
     * `containerd` daemon) as its interface to the Linux kernel namespaces,
     * cgroups, and SELinux.
     *
     * The default runtime is `runc`, and automatically configured. Additional
     * runtimes can be configured by the user and will be listed here.
     *
     * @return Runtime[]|null
     */
    public function getRuntimes(): ?iterable
    {
        return $this->runtimes;
    }

    /**
     * List of [OCI compliant](https://github.com/opencontainers/runtime-spec)
     * runtimes configured on the daemon. Keys hold the "name" used to
     * reference the runtime.
     *
     * The Docker daemon relies on an OCI compliant runtime (invoked via the
     * `containerd` daemon) as its interface to the Linux kernel namespaces,
     * cgroups, and SELinux.
     *
     * The default runtime is `runc`, and automatically configured. Additional
     * runtimes can be configured by the user and will be listed here.
     *
     * @param Runtime[]|null $runtimes
     */
    public function setRuntimes(?iterable $runtimes): self
    {
        $this->initialized['runtimes'] = true;
        $this->runtimes = $runtimes;

        return $this;
    }

    /**
     * Name of the default OCI runtime that is used when starting containers.
     *
     * The default can be overridden per-container at create time.
     */
    public function getDefaultRuntime(): ?string
    {
        return $this->defaultRuntime;
    }

    /**
     * Name of the default OCI runtime that is used when starting containers.
     *
     * The default can be overridden per-container at create time.
     */
    public function setDefaultRuntime(?string $defaultRuntime): self
    {
        $this->initialized['defaultRuntime'] = true;
        $this->defaultRuntime = $defaultRuntime;

        return $this;
    }

    /**
     * Represents generic information about swarm.
     */
    public function getSwarm(): ?SwarmInfo
    {
        return $this->swarm;
    }

    /**
     * Represents generic information about swarm.
     */
    public function setSwarm(?SwarmInfo $swarm): self
    {
        $this->initialized['swarm'] = true;
        $this->swarm = $swarm;

        return $this;
    }

    /**
     * Indicates if live restore is enabled.
     *
     * If enabled, containers are kept running when the daemon is shutdown
     * or upon daemon start if running containers are detected.
     */
    public function getLiveRestoreEnabled(): ?bool
    {
        return $this->liveRestoreEnabled;
    }

    /**
     * Indicates if live restore is enabled.
     *
     * If enabled, containers are kept running when the daemon is shutdown
     * or upon daemon start if running containers are detected.
     */
    public function setLiveRestoreEnabled(?bool $liveRestoreEnabled): self
    {
        $this->initialized['liveRestoreEnabled'] = true;
        $this->liveRestoreEnabled = $liveRestoreEnabled;

        return $this;
    }

    /**
     * Represents the isolation technology to use as a default for containers.
     * The supported values are platform-specific.
     *
     * If no isolation value is specified on daemon start, on Windows client,
     * the default is `hyperv`, and on Windows server, the default is `process`.
     *
     * This option is currently not used on other platforms.
     */
    public function getIsolation(): ?string
    {
        return $this->isolation;
    }

    /**
     * Represents the isolation technology to use as a default for containers.
     * The supported values are platform-specific.
     *
     * If no isolation value is specified on daemon start, on Windows client,
     * the default is `hyperv`, and on Windows server, the default is `process`.
     *
     * This option is currently not used on other platforms.
     */
    public function setIsolation(?string $isolation): self
    {
        $this->initialized['isolation'] = true;
        $this->isolation = $isolation;

        return $this;
    }

    /**
     * Name and, optional, path of the `docker-init` binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function getInitBinary(): ?string
    {
        return $this->initBinary;
    }

    /**
     * Name and, optional, path of the `docker-init` binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function setInitBinary(?string $initBinary): self
    {
        $this->initialized['initBinary'] = true;
        $this->initBinary = $initBinary;

        return $this;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function getContainerdCommit(): ?Commit
    {
        return $this->containerdCommit;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function setContainerdCommit(?Commit $containerdCommit): self
    {
        $this->initialized['containerdCommit'] = true;
        $this->containerdCommit = $containerdCommit;

        return $this;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function getRuncCommit(): ?Commit
    {
        return $this->runcCommit;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function setRuncCommit(?Commit $runcCommit): self
    {
        $this->initialized['runcCommit'] = true;
        $this->runcCommit = $runcCommit;

        return $this;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function getInitCommit(): ?Commit
    {
        return $this->initCommit;
    }

    /**
     * Commit holds the Git-commit (SHA1) that a binary was built from, as
     * reported in the version-string of external tools, such as `containerd`,
     * or `runC`.
     */
    public function setInitCommit(?Commit $initCommit): self
    {
        $this->initialized['initCommit'] = true;
        $this->initCommit = $initCommit;

        return $this;
    }

    /**
     * List of security features that are enabled on the daemon, such as
     * apparmor, seccomp, SELinux, user-namespaces (userns), and rootless.
     *
     * Additional configuration options for each security feature may
     * be present, and are included as a comma-separated list of key/value
     * pairs.
     *
     * @return string[]|null
     */
    public function getSecurityOptions(): ?array
    {
        return $this->securityOptions;
    }

    /**
     * List of security features that are enabled on the daemon, such as
     * apparmor, seccomp, SELinux, user-namespaces (userns), and rootless.
     *
     * Additional configuration options for each security feature may
     * be present, and are included as a comma-separated list of key/value
     * pairs.
     *
     * @param string[]|null $securityOptions
     */
    public function setSecurityOptions(?array $securityOptions): self
    {
        $this->initialized['securityOptions'] = true;
        $this->securityOptions = $securityOptions;

        return $this;
    }

    /**
     * Reports a summary of the product license on the daemon.
     *
     * If a commercial license has been applied to the daemon, information
     * such as number of nodes, and expiration are included.
     */
    public function getProductLicense(): ?string
    {
        return $this->productLicense;
    }

    /**
     * Reports a summary of the product license on the daemon.
     *
     * If a commercial license has been applied to the daemon, information
     * such as number of nodes, and expiration are included.
     */
    public function setProductLicense(?string $productLicense): self
    {
        $this->initialized['productLicense'] = true;
        $this->productLicense = $productLicense;

        return $this;
    }

    /**
     * List of custom default address pools for local networks, which can be
     * specified in the daemon.json file or dockerd option.
     *
     * Example: a Base "10.10.0.0/16" with Size 24 will define the set of 256
     * 10.10.[0-255].0/24 address pools.
     *
     * @return SystemInfoDefaultAddressPoolsItem[]|null
     */
    public function getDefaultAddressPools(): ?array
    {
        return $this->defaultAddressPools;
    }

    /**
     * List of custom default address pools for local networks, which can be
     * specified in the daemon.json file or dockerd option.
     *
     * Example: a Base "10.10.0.0/16" with Size 24 will define the set of 256
     * 10.10.[0-255].0/24 address pools.
     *
     * @param SystemInfoDefaultAddressPoolsItem[]|null $defaultAddressPools
     */
    public function setDefaultAddressPools(?array $defaultAddressPools): self
    {
        $this->initialized['defaultAddressPools'] = true;
        $this->defaultAddressPools = $defaultAddressPools;

        return $this;
    }

    /**
     * List of warnings / informational messages about missing features, or
     * issues related to the daemon configuration.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @return string[]|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * List of warnings / informational messages about missing features, or
     * issues related to the daemon configuration.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @param string[]|null $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
