# SilverWare Legals Module

Provides a series of basic pro forma legal pages for [SilverWare][silverware] apps, including
pages for copyright, privacy, and a disclaimer.

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Issues](#issues)
- [Contribution](#contribution)
- [Disclaimer](#disclaimer)
- [Maintainers](#maintainers)
- [License](#license)

## Requirements

- [SilverWare][silverware]

## Installation

Installation is via [Composer][composer]:

```
$ composer require silverware/legals
```

## Usage

The module provides three pages ready for use within the CMS:

- `CopyrightPage`
- `DisclaimerPage`
- `PrivacyPage`

Each is a child of the hidden `LegalPage` class. Each page comes with
pro forma content (in English) to cover the basics for sites *within Australia*.

Please note, that under no circumstances can the maintainers of this module be held
liable for any issue whatsoever relating to the use or misuse of the included content.

By using this module, you accept that you have read and understood the
[disclaimer](#disclaimer).

## Issues

Please use the [GitHub issue tracker][issues] for bug reports and feature requests.

## Contribution

Your contributions are gladly welcomed to help make this project better.
Please see [contributing](CONTRIBUTING.md) for more information.

## Disclaimer

The maintainers of this module give no warranties or representations concerning the
pro forma legal content included with this module, and accept no liability in relation
to the use of said content.

The included content is basic in nature, and should not be considered a substitute for
professional legal advice. The included content is provided as-is, and any express or
implied warranties are disclaimed.

For further information, please read the included [license](LICENSE.md).

## Maintainers

[![Colin Tucker](https://avatars3.githubusercontent.com/u/1853705?s=144)](https://github.com/colintucker) | [![Praxis Interactive](https://avatars2.githubusercontent.com/u/1782612?s=144)](https://www.praxis.net.au)
---|---
[Colin Tucker](https://github.com/colintucker) | [Praxis Interactive](https://www.praxis.net.au)

## License

[BSD-3-Clause](LICENSE.md) &copy; Praxis Interactive

[silverware]: https://github.com/praxisnetau/silverware
[composer]: https://getcomposer.org
[issues]: https://github.com/praxisnetau/silverware-legals/issues
