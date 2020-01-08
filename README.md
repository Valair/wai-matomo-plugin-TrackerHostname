# Matomo TrackerHostname Plugin

## Description

This plugin makes possible to customize the tracker hostname used in Matomo 
Javascript tracking code and image tracking link.

## Installation

Refer to [this Matamo FAQ](https://matomo.org/faq/plugins/faq_21/).

## Usage

Access your Matomo instance as super-user to configure the tracker hostname
through the System Settings.
Additionally, you can configure adding this section to your `config.ini.php`:
```
[TrackerHostname]
hostname = <TRACKER HOSTNAME>
```

**The tracker hostname must NOT include the URL schema.**
